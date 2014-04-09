<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/4/14
 * Time: 3:15 AM
 */

class LocationCity extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations_cities';

    public function get($state_province_division = null){

        if(empty($state_province_division)){
            return $this->where('active', '=', true)->get();
        }
        else{
            return $this->where('active', '=', true)->where('belongs_to_state_province_division','=', $state_province_division)->get();
        }
    }
}