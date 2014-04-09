<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/4/14
 * Time: 3:15 AM
 */

class LocationNeighborhood extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations_neighborhood';

    public function get($city = null){

        if(empty($city)){
            return $this->where('active', '=', true)->get();
        }
        else{
            return $this->where('active', '=', true)->where('belongs_to_city','=', $city)->get();
        }
    }
}