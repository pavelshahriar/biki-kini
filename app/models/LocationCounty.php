<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/4/14
 * Time: 3:14 AM
 */

class LocationCounty extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations_countries';

    public function get(){

        return $this->where('active', '=', true)->get();
    }
}