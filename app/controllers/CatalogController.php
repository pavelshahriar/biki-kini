<?php

class CatalogController extends BaseController {


    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.main';

    public function __construct() {

        $this->beforeFilter('csrf', array('on'=>'post')); //for protecting the input for CSRF attacks
    }

    /**
     * @param $sub_category
     * @param $view_type
     * @param $sort_by
     * @param $per_page
     * @param $page_no
     * @return mixed
     */
    public function showCatalog($sub_category = 0, $view_type = 'list', $sort_by = 'dd', $per_page = 5, $page_no = 1, $passed_search_result = array())
	{
        $current_category_name = Config::get('app.default_category');
        $sub_category_array = Config::get('app.default_sub_category');

        // for getting the category listing
        $category_array = $this->getCategoriesInfo();
        // for getting the actual location
        $location_array = $this->getLocationInfo();
        // for getting the actual manufacturers list
        $manufacturer_array = $this->getManufacturerInfo();

        if(empty($passed_search_result)){
            // go through the active categories to fetch the ads ( either all or category specific)
            $AdsGeneric = new AdsGeneric();
            if(!($sub_category)){
                $total_items = $AdsGeneric->getCount($sub_category);
                $ads_generic = $AdsGeneric->getItem($sub_category, $sort_by, $per_page, $page_no)->toArray();
            }else{
                foreach($category_array as $cat_info){
                    foreach($cat_info['sub_categories'] as $subcat_id => $subcat_name){
                        if($sub_category == $subcat_id){
                            $total_items = $AdsGeneric->getCount($sub_category);
                            $ads_generic = $AdsGeneric->getItem($sub_category, $sort_by, $per_page, $page_no)->toArray();

                            $current_category_name = $subcat_name;
                            $sub_category_array = $cat_info['sub_categories'];

                            $sub_category_array[0] = 'All'; // we need to insert this manually as there is no category named 'All' in DB
                            ksort($sub_category_array);
                        }
                    }
                }
            }
        }else{ // called from search page and it already has the search result in it
            $ads_generic = $passed_search_result;
            $total_items = count($ads_generic);
        }

        // format the ad info for sending to views
        for ($i = 0; $i < count($ads_generic); $i++) {

            // get the name of the manufacturer
            $ads_generic[$i]['manufacturer_id'] = $this->formatManufacturersData($ads_generic[$i]['manufacturer_id']);
            // get the actual location of the ad
            $ads_generic[$i]['compiled_location'] = $this->formatLocationData($ads_generic[$i]['compiled_location'], $location_array);
            // send only one photo
            $ads_generic[$i]['photos'] = $this->formatPhotosData($ads_generic[$i]['photos']);
            // get the poster name
            $ads_generic[$i]['poster_id'] = $this->formatPosterData($ads_generic[$i]['poster_id']);
        }

        // for pagination
        $total_pages = $total_items / $per_page;
        if($total_items % $per_page){
            $total_pages ++;
        }

        // prepare the data array to be sent to the view
        $data = array();

        $data['active_menu'] = (empty($passed_search_result)) ? 'catalog' : '';
        $data['search_result'] = (empty($passed_search_result)) ? false : true;

        $data['current_category_name'] = $current_category_name;
        $data['sub_category_array'] = $sub_category_array;
        $data['sub_category'] = $sub_category;
        $data['total_items'] = $total_items;
        $data['total_pages'] = $total_pages;
        $data['view_type'] = $view_type;
        $data['sort_by'] = $sort_by;
        $data['per_page'] = $per_page;
        $data['page_no'] = $page_no;
        $data['ads'] = $ads_generic;

        $data['search_panel_data'] = $this->formatSearchPanelData($sub_category_array, $manufacturer_array);

        $this->layout->content = View::make('catalog.index')->with('data',$data);
	}

    public function itemDetails($item_id){

        // for getting the category listing
        $category_array = $this->getCategoriesInfo();
        // for getting the actual location
        $location_array = $this->getLocationInfo();

        // get the generic info
        $ad_generic_info = AdsGeneric::find($item_id)->toArray();

        // get the name of the manufacturer
        $ad_generic_info['manufacturer_id'] = $this->formatManufacturersData($ad_generic_info['manufacturer_id']);
        // get the actual location of the ad
        $ad_generic_info['compiled_location'] = $this->formatLocationData($ad_generic_info['compiled_location'], $location_array);
        // send the photo list as array
        $ad_generic_info['photos'] = $this->formatPhotosData($ad_generic_info['photos'] , 'item');
        // get the poster name
        $ad_generic_info['poster_id'] = $this->formatPosterData($ad_generic_info['poster_id'], 'item');

        // traverese through the category array to get he sub category name
        $sub_category_name = '';
        foreach($category_array as $cat_info){
            foreach($cat_info['sub_categories'] as $subcat_id => $subcat_name){
                if($ad_generic_info['sub_category'] == $subcat_id){
                    $sub_category_name = $subcat_name;
                }
            }
        }

        // dynamically form the extended info class name based onthe sub category
        $method_name = 'AdsExtended'. $sub_category_name;
        $ad_extended_info = $method_name::where('belong_to_post_id', '=', $ad_generic_info['id'])->get()->first()->toArray();

        //remove the unnecessary values from the extended array
        unset($ad_extended_info['id']);
        unset($ad_extended_info['belong_to_post_id']);

        // prepare the data array to be sent to the view
        $data = array();
        $data['active_menu'] = '';
        $data['ad_info'] = $ad_generic_info;
        $data['ad_ext_info'] = $ad_extended_info;
        $this->layout->content = View::make('item.index')->with('data',$data);

    }

    public function postSearch(){

        $validator = Validator::make(Input::all(), AdsGeneric::$rules_search);
        if ($validator->passes()) {

            $sub_category = Input::get('category');

            $neighborhood = Input::get('location');
            $city = LocationNeighborhood::find($neighborhood)->belongs_to_city;
            $division = LocationCity::find($city)->belongs_to_state_province_division;
            $country = LocationStateProvinceDivision::find($division)->belongs_to_country;
            $compiled_location = $country.'.'.$division.'.'.$city.'.'.$neighborhood;

            $man_id = Input::get('manufacturer');
            $man_name = Manufacturer::find($man_id)->name;
            $manufacturer = Manufacturer::where('name','=',$man_name)->where('under_sub_category','=',$sub_category)->get()->toArray();
            $manufacturer_id = $manufacturer[0]['id'];

            $is_new = Input::get('condition');

            $price_from = Input::get('price_from');
            $price_to = Input::get('price_to');
            if(empty($price_from) && empty($price_to)){
                $price_from = 0;
                $price_to = 999999999;
            }

            $AdsGeneric = new AdsGeneric();
            $search_result = $AdsGeneric->getSearchResult($sub_category, $compiled_location, $manufacturer_id, $is_new, $price_from, $price_to)->toArray();

            $this->showCatalog($sub_category,'list','dd',count($search_result),1,$search_result);


        }else{
            // validation has failed, display error messages
            return Redirect::to('catalog')
                ->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }


    /**
     * @param
     * @return mixed
     */
    public function getCategoriesInfo(){

        // get all the sub categories and keep them in an array
        $categories = new Category();
        $categories_all = $categories->get();

        // get all the sub sub-categories and keep them in an array
        $sub_categories = new SubCategory();
        $sub_categories_all = $sub_categories->get();

        $category_array = array();
        foreach($categories_all as $cat){
            $category_array[$cat['id']] = array('name' => $cat['name']);

            $sub_category_array = array();
            foreach($sub_categories_all as $subcat){
                if($subcat['belongs_to_category'] == $cat['id']){
                    $sub_category_array[$subcat['id']] = $subcat['name'];
                }
            }
            $category_array[$cat['id']]['sub_categories'] = $sub_category_array;
        }

        return $category_array;

    }

    /**
     * @param
     * @return mixed
     */
    public function getLocationInfo(){

        $country = new LocationCounty();
        $country_all = $country->get()->toArray();

        $state_province_division = new LocationStateProvinceDivision();
        $state_province_division_all = $state_province_division->get()->toArray();

        $city = new LocationCity();
        $city_all = $city->get()->toArray();

        $neighborhood = new LocationNeighborhood();
        $neighborhood_all = $neighborhood->get()->toArray();

        // at first create the neighbor array
        $neighborhood_array = array();
        foreach($neighborhood_all as $nbrhd){
            $neighborhood_array[$nbrhd['belongs_to_city']][$nbrhd['id']] = $nbrhd['name'];
        }

        // then for each city, insert the neighbors array and form the city array
        $city_array = array();
        foreach($city_all as $cty){
            $city_array[$cty['belongs_to_state_province_division']][$cty['id']] = array('name' => $cty['name']);
            if(!empty($neighborhood_array[$cty['id']])){
                $city_array[$cty['belongs_to_state_province_division']][$cty['id']]['neighborhoods'] = $neighborhood_array[$cty['id']];
            }
        }

        // then again for each division, insert the city array and form the division array
        $state_province_division_array = array();
        foreach($state_province_division_all as $spd){
            $state_province_division_array[$spd['belongs_to_country']][$spd['id']] = array('name' => $spd['name']);
            if(!empty($city_array[$spd['id']])){
                $state_province_division_array[$spd['belongs_to_country']][$spd['id']]['cities'] = $city_array[$spd['id']];
            }
        }

        // And finally for each country, insert the division array and form the final country array
        $country_array = array();
        foreach($country_all as $cntry){
            $country_array[$cntry['id']] = array('name' => $cntry['name']);
            if(!empty($state_province_division_array[$cntry['id']])){
                $country_array[$cntry['id']]['states_provinces_divisions'] = $state_province_division_array[$cntry['id']];
            }
        }
        return $country_array;
    }

    public function getManufacturerInfo(){
        $man_all = Manufacturer::all()->toArray();

        $manufacturer_array = array();
        foreach($man_all as $man){
            $manufacturer_array[$man['under_sub_category']][$man['id']] = $man['name'];
        }

        return $manufacturer_array;
    }

    /**
     * @param $compiled_location
     * @param $location_array
     * @return string
     */
    public function formatLocationData($compiled_location, $location_array){

        $loc = explode(".", $compiled_location);
        $location = $location_array[$loc[0]]['states_provinces_divisions']
        [$loc[1]]['cities']
        [$loc[2]]['neighborhoods']
        [$loc[3]];

        return $location;

    }

    /**
     * @param $poster_id
     * @return string
     */
    public function formatPosterData($poster_id, $tag = 'catalog'){

        $poster_info = array('name' => '');
        $user_info = User::find($poster_id)->toArray();
        $poster_info['name'] = $user_info['username'];

        if($tag == 'item'){
            $poster_info['email'] = $user_info['email'];
            $poster_info['mobile'] = $user_info['mobile'];
        }

        return $poster_info;
    }

    public function formatPhotosData($photos, $tag = 'catalog'){

        $photos_array = array('featured' => '', 'total_photos' => 0);
        $photos = explode(",", $photos);
        if(!empty($photos[0])){
            $photos_array['featured'] = $photos[0];
            $photos_array['total_photos'] ++;
        }

        if($tag != 'catalog'){
            unset($photos[0]);
            $photos_array['gallery'] = $photos;
            $photos_array['total_photos'] = $photos_array['total_photos'] + count($photos);
        }

        return $photos_array;
    }

    public function formatManufacturersData($man_id){

        $manufacturer_info = Manufacturer::find($man_id)->toArray();
        return $manufacturer_info['name'];
    }

    public function formatSearchPanelData($categories, $manufacturers){

        $location_all = LocationNeighborhood::where('active','=',true)->get()->toArray();
        $locations_finale = array();
        foreach($location_all as $loc){
            $locations_finale[$loc['id']] = $loc['name'];
        }
        ksort($locations_finale);

        $manufacturer_finale = array();
        foreach($manufacturers as $man){
            foreach($man as $key => $val){
                $manufacturer_finale[$key] = $val;
            }
        }
        $manufacturer_finale = array_unique($manufacturer_finale);
        ksort($manufacturer_finale);

        $conditions = array('Used', 'New');

        return array('category'     => $categories,
                     'location'     => $locations_finale,
                     'manufacturer' => $manufacturer_finale,
                     'condition'    => $conditions);
    }

}