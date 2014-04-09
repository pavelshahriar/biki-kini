<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/6/14
 * Time: 10:02 PM
 */

class PostController extends BaseController {


    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.main';

    public function __construct() {

        $this->beforeFilter('csrf', array('on'=>'post')); //for protecting the input for CSRF attacks
    }

    public function showForm(){

        $form_elements = array();

        //prepare the sub categories
        $categories = Config::get('app.default_sub_category');
        unset($categories[0]);

        // prepare the location
        $location_all = LocationNeighborhood::where('active','=',true)->get()->toArray();
        $locations_finale = array();
        foreach($location_all as $loc){
            $locations_finale[$loc['id']] = $loc['name'];
        }
        ksort($locations_finale);

        // prepare the manufacturers
        $man_all = Manufacturer::all()->toArray();
        $manufacturers = array();
        foreach($man_all as $man){
            $manufacturers[$man['id']] = $man['name'];
        }
        $manufacturers = array_unique($manufacturers);
        ksort($manufacturers);

        // prepare conditions
        $conditions = array('Used', 'New');

        $form_elements['category']     = $categories;
        $form_elements['location']     = $locations_finale;
        $form_elements['manufacturer'] = $manufacturers;
        $form_elements['condition']    = $conditions;

        $data['form_elements'] = $form_elements;

        foreach($categories as $id => $cat){
            $ext_model_name = 'AdsExtended'.$cat;

            $extended_columns = array_keys($ext_model_name::all()->first()->toArray());
            $id_column = array_search('id', $extended_columns);
            unset($extended_columns[$id_column]);
            $post_id_column = array_search('belong_to_post_id', $extended_columns);
            unset($extended_columns[$post_id_column]);
            $created_at = array_search('created_at', $extended_columns);
            unset($extended_columns[$created_at]);
            $updated_at = array_search('updated_at', $extended_columns);
            unset($extended_columns[$updated_at]);

//            unset($extended_columns[0]);
//            unset($extended_columns[1]);
            $extended_columns = array_values($extended_columns);

            $data['form_elements']['extended'][$id] = $extended_columns;
        }

        $data['active_menu'] = 'users';
        $this->layout->content = View::make('ad.new')->with('data',$data);

    }

    public function postForm(){

        $validator = Validator::make(Input::all(), AdsGeneric::$rules_post);
        if ($validator->passes()) {

            // validation has passed, save user in DB
            $ads_generic = array();

            $ads_generic['poster_id'] = Auth::user()->id;
            $ads_generic['sub_category'] = Input::get('category');
            $ads_generic['title'] = Input::get('title');
            $ads_generic['description'] = Input::get('description');
            // preapre manufacturer
            $man_id = Input::get('manufacturer');

            $man_name = Manufacturer::find($man_id)->name;

            $manufacturer = Manufacturer::where('name','=',$man_name)->where('under_sub_category','=',Input::get('category'))->get()->toArray();

            $ads_generic['manufacturer_id'] = (!empty($manufacturer)) ? $manufacturer[0]['id'] : $man_id;
            // price related
            $ads_generic['price'] = Input::get('price');
            $ads_generic['price_negotiable'] = Input::get('price_negotiable',false);
            // prepapre location data
            $neighborhood = Input::get('location');
            $city = LocationNeighborhood::find($neighborhood)->belongs_to_city;
            $division = LocationCity::find($city)->belongs_to_state_province_division;
            $country = LocationStateProvinceDivision::find($division)->belongs_to_country;
            $ads_generic['compiled_location'] = $country.'.'.$division.'.'.$city.'.'.$neighborhood;
            // prepare the image realted data
            $file = Input::file('image');
            if(!empty($file)){
                $filename = $file->getClientOriginalName();
                $ads_generic['photos'] = $filename;
            }
            // others
            $ads_generic['is_new'] = Input::get('condition');
            $ads_generic['deleted'] = false;
            //insert and get the id
            $inserted_id = AdsGeneric::insertGetId($ads_generic);
            // save the image in right dest
            if(!empty($file)){
                $destinationPath = base_path().'/public/assets/ads/'.$inserted_id.'/';
                Input::file('image')->move($destinationPath, $filename);
            }

            // Insert extended data table
            $default_categories = Config::get('app.default_sub_category');
            $method_name = "AdsExtended".$default_categories[$ads_generic['sub_category']];
            $extended_columns = array_keys($method_name::all()->first()->toArray());
            unset($extended_columns[0]);
            unset($extended_columns[1]);
            $extended_columns = array_values($extended_columns);

            $ads_extended = new $method_name;
            $ads_extended->belong_to_post_id = $inserted_id;
            foreach($extended_columns as $id => $column_name){
                $ads_extended->$column_name = Input::get($column_name);
            }
            $ads_extended->save();



            return Redirect::to('users/dashboard')->with('message', 'The post was created successfully');

        }else{

            return Redirect::to('ad/new')
                ->with('message', 'The following errors occurred')->withErrors($validator)->withInput();

        }

    }
}