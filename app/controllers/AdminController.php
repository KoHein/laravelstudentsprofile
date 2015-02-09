<?php

use Auth, DB, BaseController, Form, Input, Redirect, Sentry, View;

class AdminController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth.admin', array(
            'only' => array(
                'getAdminPanel',
                'getLogout'
                )
            ));
    }

	 /**
	 * Admin Panel page 
	 *
	 **/
    public function getAdminPanel()
    {
        $keke = DB::table('usersdata')->get();
        return View::make('adminpanel')->with('keke', $keke);
    }


    public function postAdminPanel()
    {

        return View::make('admin-panel');

    }


	 /**
	 * Login page 
	 *
	 **/
    public function getLogin()
    {
       return View::make('login');
   }

    /**
    * Login action
    * @return Redirect
    */
    public function postLogin()
    {
    $credentials = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
        );

    try
    {
        $user = Sentry::authenticate($credentials, false);

        if ($user)
        {
            return Redirect::to('admin/admin-panel');
        }
    }
    catch(\Exception $e)
    {
        return Redirect::to('admin/login')->withErrors(array('login' => $e->getMessage()));
    }
}

     /**
     * Logout
     *
     **/
     public function getLogout()
     {
        Sentry::logout();
        return Redirect::to('admin/login');
    }


    public function getApprove($id)
    {
        DB::table('usersdata')
        ->where('id', $id)
        ->update(array('verify' => 1));
        return Redirect::action('AdminController@getAdminPanel');
    }

    public function getDelete($id)
    {
        DB::table('usersdata')->where('id', $id)->delete();
        return Redirect::action('AdminController@getAdminPanel');
    }

    public function getAddskill($id)
    {
        $member = DB::table('usersdata')->where('id',$id)->get();

        $a=0;   
        for ($i=0; $i < 100 ; $i=$i+10) { 
            $a=$a+1;
            $count[$a]=$i;
        }

        return View::make('addskill')->with('member', $member)->with('count',$count);
    }

    public function postAddskill()
    {
        DB::table('usersdata')
        ->where('id', Input::get('id'))
        ->update(array
            ('webdesign'    => Input::get('webdesign'),
                'graphicdesign' => Input::get('graphicdesign'),
                'branding'      => Input::get('branding'), 
                'd3model'       => Input::get('d3model'), 
                'illustration'  => Input::get('illustration'), 
                'photography'   => Input::get('photography'))); 

        echo 'adding';
        return View::make('admin/adminpanel');
    }

}
