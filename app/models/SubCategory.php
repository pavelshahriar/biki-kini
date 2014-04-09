<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/3/14
 * Time: 8:17 PM
 */

class SubCategory extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_categories';

    public function get($category = null){

        if(empty($category)){
            return $this->where('active', '=', true)->get();
        }
        else{
            return $this->where('active', '=', true)->where('belongs_to_category','=', $category)->get();
        }
    }
}