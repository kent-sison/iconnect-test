<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Card_type;

class CardFunctions extends Model
{

    public static function cardFunctions() {
        return new CardFunctions;
    } 

    protected function AvailableCount(CardFunctions $model) {
        $model = new CardFunctions();
        return $model::where('available', 1)->count();
    }

    public static function InStockCard($card_value) {
        // Count if there are datas with valid card code
        if(Card_type::where('card_code', $card_value)->count() < 1) {
            return false;
        }

        $model;

        switch($card_value) {
            case 10:
                $model = new card_advance_10;
            break;
            case 20:
                $model = new card_advance_20;
            break;
            case 7:
                $model = new card_lte_20;
            break;
            default:
                return false;
        }

        // Return False if there are no available cards
        if($model::where('available', 1)->count() < 1) {
            return false;
        }

        return true;

    }


    /**
     * ––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
     *      Criteria as an array with keys
     * ––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
     * 
     */
    public static function GetColumnWithCardCode($tableName, $column, $cardCode) {

        if(self::cardFunctions()->isNullOrEmpty($column)) {
            throw new Exception("No value assigned to column.");
        }

        if(self::cardFunctions()->isNullOrEmpty($cardCode)) {
            throw new Exception("No value assigned to card code.");
        }

        if($tableName == 'card_types') {
            $tableName = 'Card_type';
        }

        $tableName = 'App\\' . $tableName;

        // $tableName = new $tableName;
        
        // $tableName = $tableName->getClassNameFromTableName(
        //     $tableName->GetTableNameFromType($cardCode)
        // );

        $model = new $tableName;

        $model = $model::where('card_code', $cardCode)->first();

        return $model->$column;

        // Test Case

    }

    /*----------------------------------------------------------------
    *   Update And Get Data From Cards Tables
    *-----------------------------------------------------------------
    *
    *   Update datas from table and 
    *   Return Serial Number and Pin
    */
    public function UpdateAndGetData(Request $request) {

        $model = new CardFunctions();        
        $newData = array('available' => 0);
        $serialAndPin = array();

        $table = $model->GetTableNameFromType($request->get('card_value'));
        $tableCols = $model->GetTableColumns($table);
        $tableName = $this->getClassNameFromTableName($table);// TEST "App\\" . substr($table, 0, strlen($table) - 1);

        $model = new $tableName;


        // Insert All Specific Columns (ex. email, etc.)
        foreach($request->except('_token') as $key => $x) {
            foreach($tableCols as $tableCol) {
                if($tableCol == $key) {
                    $newData[$tableCol] = $request->get($key);
                }
            }
        }

        /**
         * NOTE: 
         * After getting all Populatable datas
         * Declare a new instance of the model
         * which is $model = new $tableName;
         *
         * After declaring a new instance,
         * Input the populatable datas to the model.
         * 
         */

        foreach($newData as $data) {
            $model->$data = $request->get($data);
        }

        $tblObject = $model::where('available', 1)->first();

        $serialAndPin['serial_number'] = $tblObject->serial_number;
        $serialAndPin['pin'] = $tblObject->pin;

        $tblObject = $model::where($serialAndPin)->update($newData);

        return $serialAndPin;

    }

    /**
     * -----------------------------------------------------------------
     *      Returns all Columns of the table
     * -----------------------------------------------------------------
     * 
     */
    public function GetTableColumns($table) {
        if($table == NULL || $table == '') {
            throw new Exception("Table name is not defined");
        }

        $retArray = \DB::getSchemaBuilder()->getColumnListing($table);

        if($retArray == NULL) {
            throw new Exception("No datas returned from the database.");
        }

        return $retArray;
    }

    /**
     * ––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
     *      Get the table name from Card_types table
     * ––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
     * 
     */
    public function GetTableNameFromType($card_type) {

        $tableName = Card_type::where('card_code', $card_type)->first();

        if($tableName == NULL || $tableName == '') {
            throw new Exception("No table found for the card type " . [$card_type]);
        }

        return $tableName->table_name;
    }


    private function getClassNameFromTableName($tableName) {

        return "App\\" . substr($tableName, 0, strlen($tableName) - 1);

    }

    private function isNullOrEmpty($var) {
        
        if(is_array($var)) {
            foreach($var as $item) {
                if($this->isNullOrEmpty($item)) {                    
                    return true;
                }
            }
            return false;
        }

        if(empty($var) || is_null($var)) {
            return true;
        }
        
        return false;
    }

    
}
