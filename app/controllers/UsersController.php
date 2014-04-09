<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/5/14
 * Time: 3:23 PM
 */


class UsersController extends BaseController {


    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.main';

    public function __construct() {

        $this->beforeFilter('csrf', array('on'=>'post')); //for protecting the input for CSRF attacks
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getRegister() {

        $data['active_menu'] = 'users';

        $this->layout->content = View::make('users.register')->with('data',$data);
    }

    public function getLogin() {

        $data['active_menu'] = 'users';

        if(!Auth::check()){
            $this->layout->content = View::make('users.login')->with('data',$data);
        }
        else{
            return Redirect::to('users/dashboard');
        }
    }

    public function getDashboard($tag = 'active') {

        // redirect for admins
        $roles = Config::get('app.user_roles');
        if(Auth::user()->role == $roles['admin']){
            return Redirect::to('admin/dashboard')
                ->with('message', 'Welcome, '.Auth::user()->username.' !');
        }

        if($tag == 'active'){
            $user_ads = AdsGeneric::where('poster_id', '=', Auth::user()->id)->where('deleted','=',false)->get()->toArray();
        }
        else if($tag == 'archived'){
            $user_ads = AdsGeneric::where('poster_id', '=', Auth::user()->id)->where('deleted','=',true)->get()->toArray();
        }


        $catalog_controller = new CatalogController();
        $location_array = $catalog_controller->getLocationInfo();

        // format the ad info for sending to views
        for ($i = 0; $i < count($user_ads); $i++) {

            // get the name of the manufacturer
            $user_ads[$i]['manufacturer_id'] = $catalog_controller->formatManufacturersData($user_ads[$i]['manufacturer_id']);
            // get the actual location of the ad
            $user_ads[$i]['compiled_location'] = $catalog_controller->formatLocationData($user_ads[$i]['compiled_location'], $location_array);
            // format the photos data
            $user_ads[$i]['photos'] = $catalog_controller->formatPhotosData($user_ads[$i]['photos'], 'dashboard');
            // get the poster name
            $user_ads[$i]['poster_id'] = $catalog_controller->formatPosterData($user_ads[$i]['poster_id']);
        }


        $data['active_menu'] = 'users';
        $data['tag'] = $tag;
        $data['user_ads'] = $user_ads;

        $this->layout->content = View::make('users.dashboard')
            ->with('data',$data)
            ->with('message', 'Hi, '.Auth::user()->username.' !');
    }

    public function getLogout(){

        Auth::logout();

        $data['active_menu'] = 'users';

        return Redirect::to('users/login')->with('data',$data)->with('message', 'Your are now logged out!');

    }

    public function archiveItem($item_id, $reverse = false){

        // get the item details
        $item_info = AdsGeneric::find($item_id);
        $poster_id = $item_info->poster_id;

        // at first check if the item belongs to the logged in user or not
        if(Auth::user()->id != $poster_id){
            App::abort(401, 'You are not authorized.');
        }

        if(!$reverse){
            $item_info->deleted = true;
        }
        else{
            $item_info->deleted = false;
        }
        $item_info->save();

        if(!$reverse){
            return Redirect::to('users/dashboard/active');
        }
        return Redirect::to('users/dashboard/archived');

    }


    public function postCreate(){

        $data['active_menu'] = 'users';

        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {

            // validation has passed, save user in DB
            $user = new User;
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('users/login')
                ->with('data',$data)
                ->with('message', 'Thanks for registering!');
        } else {

            // validation has failed, display error messages
            return Redirect::to('users/register')
                ->with('data',$data)
                ->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function postSignin() {

        $data['active_menu'] = 'users';

        if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {

            $roles = Config::get('app.user_roles');
            if(Auth::user()->role == $roles['user']){
                return Redirect::to('users/dashboard')
                    ->with('data',$data)
                    ->with('message', 'Welcome, '.Auth::user()->username.' !');
            }
            else if(Auth::user()->role == $roles['admin']){
                return Redirect::to('admin/dashboard')
                    ->with('data',$data)
                    ->with('message', 'Welcome, '.Auth::user()->username.' !');
            }
        } else {
            return Redirect::to('users/login')
                ->with('data',$data)
                ->with('message', 'Username/password combo incorrect !<br/>Try Again ?')
                ->withInput();
        }
    }


    public function getAdminDashboard($tag = 'active'){

        // double check if the logged in user is admin or not
        $roles = Config::get('app.user_roles');
        if(Auth::user()->role != $roles['admin']){
            App::abort(401, 'You are not authorized.');
        }

        if($tag == 'active'){
            $users = User::where('active', '=', true)->where('role', '!=', $roles['admin'])->get()->toArray();
        }
        else if($tag == 'banned'){
            $users = User::where('active', '=', false)->where('role', '!=', $roles['admin'])->get()->toArray();
        }

        $data['active_menu'] = 'users';
        $data['tag'] = $tag;
        $data['users'] = $users;

        $this->layout->content = View::make('admin.dashboard')
            ->with('data',$data)
            ->with('message', 'Hi, '.Auth::user()->username.' !');

    }

    public function banUser($uid, $reverse = false){
        // double check if the logged in user is admin or not
        $roles = Config::get('app.user_roles');
        if(Auth::user()->role != $roles['admin']){
            App::abort(401, 'You are not authorized.');
        }

        $user_info = User::find($uid);

        if(!$reverse){
            $user_info->active = false;
        }
        else{
            $user_info->active = true;
        }
        $user_info->save();

        if(!$reverse){
            return Redirect::to('admin/dashboard/active');
        }
        return Redirect::to('admin/dashboard/banned');


    }


}
