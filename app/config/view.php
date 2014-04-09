<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| View Storage Paths
	|--------------------------------------------------------------------------
	|
	| Most templating systems load templates from disk. Here you may specify
	| an array of paths that should be checked for your views. Of course
	| the usual Laravel view path has already been registered for you.
	|
	*/

	'paths' => array(__DIR__.'/../views'),

	/*
	|--------------------------------------------------------------------------
	| Pagination View
	|--------------------------------------------------------------------------
	|
	| This view will be used to render the pagination link output, and can
	| be easily customized here to show any view you like. A clean view
	| compatible with Twitter's Bootstrap is given to you by default.
	|
	*/

	'pagination' => 'pagination::slider-3',

    'site_title' => 'Vehicle S mart',
    'site_url'   => 'http://localhost/vehiclesmart/public',
    'top_menu_items'   => array('home', 'catalog', 'users'),

    'catalog_sort_keymap' => array(
                                    'dd' => array('created_at', 'ASC'),
                                    'pa' => array('price', 'ASC'),
                                    'pd' => array('price', 'DESC'),
                                    'ta' => array('title', 'ASC'),
                                    'td' => array('title', 'DESC'),
    ),
    'catalog_sort_titles' => array(
        'dd' => 'Publish Date',
        'pa' => 'Price ASC',
        'pd' => 'Price DESC',
        'ta' => 'Title ASC',
        'td' => 'Title DESC',
    ),
    'catalog_items_per_page_array' => array( 1, 5, 10, 15 ),


);
