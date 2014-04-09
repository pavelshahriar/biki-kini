<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/3/14
 * Time: 2:26 PM
 */

class AdsGeneric extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ads_generic';

    // validation rules
    public static $rules_search = array(
        'category'=>'required|digits:1',
        'location'=>'required|digits_between:1,2',
        'manufacturer'=>'required|digits_between:1,2',
        'condition'=>'required|digits:1',
        'price_from'=>'required_with:price_to|digits_between:1,8',
        'price_to'=>'required_with:price_from|digits_between:1,8',
    );

    // validation rules
    public static $rules_post = array(
        'title'=>'required|min:5',
        'category'=>'required|digits:1',
        'location'=>'required|digits_between:1,2',
        'manufacturer'=>'required|digits_between:1,2',
        'condition'=>'required|digits:1',
        'price'=>'required|digits_between:1,8',

        'model_name'=>'min:2',
        'model_year'=>'integer|digits:4',
        'registration_year'=>'integer|digits:4',
        'engine_capacity'=>'digits_between:1,8',
        'mileage' => 'digits_between:1,8',

        'body_length'=>'integer',
        'body_width'=>'integer',
        'body_height'=>'integer',
        'no_of_engine'=>'integer|digits_between:1,2',
        'engine_power'=>'integer|digits_between:1,5',
        'passenger_capacity'=>'integer|digits_between:1,5',
    );


    public function getItem($sub_category, $sort_by_info, $per_page, $page_no){

        $sort_by = Config::get('view.catalog_sort_keymap')[$sort_by_info];
        $need_to_skip = $per_page * ($page_no-1);

        if(!$sub_category){
            return $this->where('deleted', '=', false)->orderBy($sort_by[0],$sort_by[1])->skip($need_to_skip)->take($per_page)->get();
        }
        else{
            return $this->where('deleted', '=', false)->where('sub_category','=', $sub_category)->orderBy($sort_by[0],$sort_by[1])->skip($need_to_skip)->take($per_page)->get();
        }
    }

    public function getCount($sub_category){

        if(!$sub_category){
            return $this->where('deleted', '=', false)->count();
        }
        else{
            return $this->where('deleted', '=', false)->where('sub_category','=', $sub_category)->count();
        }
    }

    public function getSearchResult($sub_category, $compiled_location, $manufacturer_id, $is_new, $price_from, $price_to){

        return $this->where('sub_category','=',$sub_category)
                    ->where('compiled_location','=',$compiled_location)
                    ->where('manufacturer_id','=',$manufacturer_id)
                    ->where('is_new','=',$is_new)
                    ->whereBetween('price', array($price_from, $price_to))
                    ->get();
    }

}

