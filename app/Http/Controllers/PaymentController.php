<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;
use App\Card_type;
use App\CardFunctions;
use App\Rules\isValidCC;
use App\Rules\HasStock;
use App\Mail\SendCard;

class PaymentController extends Controller
{
    private $card_details;

    public function index() {
        
    }

    public function Reload() {

        $cards = Card_type::all();

        $c_a_10 = \App\card_advance_10::GetAvailableCards();
        $c_a_20 = \App\card_advance_20::GetAvailableCards();
        $c_l_20 = \App\card_lte_20::GetAvailableCards();

        return view('payment.reload', compact('cards', 'c_a_10', 'c_a_20', 'c_l_20'));
    }

    public function Reload_Purchase(Request $request) {

        $this->validate(request(), [
            'token' => 'required',
            'card_select' => 'required|exists:card_types,card_code',
            'confirm_user' => 'accepted'
        ]);

        $card_select = $request->card_select;
        $countries = \App\Countries::get();
        $card_desc = Card_type::where('card_code', $card_select)->first();
        
        return view('payment.reload_purchase', compact('countries', 'card_desc', 'card_select'));
    }

    public function Reload_Complete(Request $request) {

        $this->validate(request(), [
            'email' => 'required|email',
            'fname' => 'required|alpha|min:1|max:100',
            'lname' => 'required|alpha|min:1|max:100',
            'country' => 'exists:countries,code',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required|alpha',
            'zipcode' => 'required|numeric',

            'cc_number' => 'required|digits:16',
            'cvv' => 'required|digits_between:3,4',
            'exp_date' => 'required|date_format:"m/y"',

            'token' => 'required',

            'confirm_user' => 'accepted',
            'confirm_final' => 'accepted ',

            'g-recaptcha-response' => 'required|recaptcha',
            
            'card_value' => 'required|exists:card_types,card_code'

        ]);

        $request->validate([
            'cc_number' => ['required', 'string', new isValidCC],
            'card_value' => ['required', 'string', new HasStock]
        ]);

        $card_details = CardFunctions::cardFunctions()->UpdateAndGetData($request);
        $card_type = $request->card_value;
        $card = CardFunctions::GetColumnWithCardCode('card_types', 'card_desc', $card_type);

        \Mail::to($request)->send(new SendCard($card_details, $card_type, $card, $this->baseUrl()));

        return view('payment.reload_complete', compact('card_details', 'card_type', 'card'));
    }

    private function baseUrl() {
        $currentPath = $_SERVER['PHP_SELF']; 
    
        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
        $pathInfo = pathinfo($currentPath); 
        
        // output: localhost
        $hostName = $_SERVER['HTTP_HOST']; 
        
        // output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        
        // return: http://localhost/myproject/
        return $protocol.$hostName.$pathInfo['dirname']."/";
    }

}