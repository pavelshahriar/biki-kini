<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/4/14
 * Time: 3:15 AM
 */

class LocationStateProvinceDivision extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations_states_provinces_divisions';

    public function get($country = null){

        if(empty($country)){
            return $this->where('active', '=', true)->get();
        }
        else{
            return $this->where('active', '=', true)->where('belongs_to_country','=', $country)->get();
        }
    }
}