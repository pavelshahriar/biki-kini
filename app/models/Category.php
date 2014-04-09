<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/3/14
 * Time: 8:48 PM
 */

class Category extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public function get(){
            return $this->where('active', '=', true)->get();
    }
}