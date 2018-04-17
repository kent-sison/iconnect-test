@extends ('common.master')

@section ('page-content')

<section class="blue-gradient padded-top">

    <div class="container">
        
        @include('payment.partial_reload_head');

        <div class="row">
                    
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-center well">
                        <div class="alert alert-info">iConnect Advanced Prepaid Reload Cards are only for <a href="advanced_prepaid-plans" target="_blank" class="link">Prepaid</a> SIMs. If you are subscribed to our <a href="advanced_postpaid-plans" target="_blank" class="link">Postpaid</a> Plans, these reload cards are not applicable for your SIM.</div>
                        
                        <h3>You are purchasing a {{ $card_desc->card_desc }}</h3>
                        
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                            <img src="assets/img/reload/card{{ $card_select }}.png" class="img-responsive">
                            </div>
                        </div>
                        <br>
                        
                        <form name="purchase_card_form" method="POST" action="reload/purchase" class="ws-validate">
                            @csrf
                            <p>
                                A digital copy of your purchase information will be sent to this email.
                                <br>
                                Please make sure that this is valid.
                            </p>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="email" class="form-control" name="email" placeholder="Email" maxlength="50" required="" data-errormessage="Please enter a valid email.">
                                </div>
                            </div>
                            
                            @include ('payment.partial_credit_card')

                            <p>Please enter your credit card information:</p>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" maxlength="15" required="" pattern="^[a-zA-Z\s]{3,15}$" data-errormessage="First Name must be 3-15 alphabets only, including whitespace.">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" maxlength="15" required="" pattern="^[a-zA-Z\s]{2,15}$" data-errormessage="Last Name must be 2-15 alphabets only, including whitespace.">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="cc_number" placeholder="Credit Card Number" maxlength="19" required="" data-errormessage="Please enter a valid credit card number." data-luhn="">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="cvv" placeholder="CVV" maxlength="4" required="" data-errormessage="Please enter a valid CVV." pattern="^\d{3,4}$">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="address" placeholder="Address" maxlength="30" required="" pattern="^[a-zA-Z0-9\s.,#&amp;]{8,30}$" data-errormessage="Address must be 8-30 alphanumeric characters and whitespace only, including special characters , . # &amp;">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="city" placeholder="City" maxlength="15" required="" pattern="^[a-zA-Z\s.]{1,15}$" data-errormessage="City must be 1-15 alphabets and whitespace only, including .">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="state" placeholder="State" maxlength="2" required="" pattern="^[A-Z]{2}$" data-errormessage="Please enter the 2-character postal code for your state in capital letters.">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" maxlength="10" required="" pattern="^[0-9]{3,10}$" data-errormessage="Zip Code must be between 3-10 digits.">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <select name="country" id="countries" class="form-control" required="">
                                        <option value="">Please select a country...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->code }}"
                                                @if ($country->country == 'Guam')
                                                    selected
                                                @endif
                                                >
                                                    {{ $country->country }}
                                                </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <input type="text" class="form-control month-year-input" name="exp_date" id="exp_date" maxlength="5" required="" pattern="^(0[1-9]|1[0-2])/[0-9]{2}$" data-errormessage="Please select an expiry date." placeholder="Expiry Date (mm/yy)">
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group checkbox">
                                    <label><input type="checkbox" required="" name="confirm_user">I am an iConnect Advanced Prepaid Subscriber</label>
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group checkbox">
                                    <label><input type="checkbox" required="" name="confirm_final">I agree that any PIN purchase I make is FINAL and NON-REFUNDABLE</label>
                                </div>
                            </div>
                            
                            <div class="alert alert-warning">
                                Clicking on the <strong class="text-uppercase">pay</strong> button below will trigger a payment that amounts to your reload card selection. Please double check all of the above information and make sure you have chosen your desired reload card!
                            </div>
                            
                            <div class="row padded-bottom" style="padding:30px 16em">
                                <div class="g-recaptcha" data-sitekey="6LcQaFEUAAAAANAHYxjcTuP7LB-KDGnhLX-0iWXd" ></div> 
                                <noscript> 
                                    <div style="width: 302px; height: 352px;"> 
                                        <div style="width: 302px; height: 352px; position: relative;"> 
                                            <div style="width: 302px; height: 352px; position: absolute;"> 
                                                <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LcQaFEUAAAAANAHYxjcTuP7LB-KDGnhLX-0iWXd" frameborder="0" scrolling="no" style="width: 302px; height:352px; border-style: none;"> 
                                                </iframe> 
                                            </div> 
                                            <div style="width: 250px; height: 80px; position: absolute; border-style: none; bottom: 21px; left: 25px; margin: 0; padding: 0; right: 25px;"> 
                                                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0; padding: 0; resize: none;"></textarea> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </noscript>
                            </div>
                            
                            <div class="row form-row">
                                <div class="form-group col-md-6 col-md-offset-3">
                                    <input type="hidden" name="card_value" value="{{$card_select}}">
                                    <input type="submit" name="card_purchase" value="Pay" class="btn btn-info btn-lg btn-block">
                                </div>
                            </div>
                        </form>

                        <p class="content-small-text text-center"><em>For instructions on how to use your reload card, click <a href="how-to-reload" class="orange-text" target="_blank">here</a>.</em></p>
                    </div>
                </div>
            </div>
    
    </div>

        <script type="text/javascript" src="{{ URL::to('assets/js/reload/valid.js') }}"></script>

</section>

@endsection