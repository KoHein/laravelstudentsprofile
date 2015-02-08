<?php

class UserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array(
                'only' => array(
                    'getEdit',
                    'getLogout'
                )
            ));
    }

	/**
	 * Display Registration Form
	 *
	 **/
	public function getRegister()
	{
        if(Auth::check()){
            return Redirect::to('user/edit');
        } else {
	    return View::make('register');
        }
	}


/**
 * Register a user
 *
 **/
public function postRegister(){

 
    // Set validation rules
    $validationRules = array(
    	'photo' => 'required|image|max:1024',
    	'username' => 'required|min:6',
    	'password' => 'required|min:6',
        'confirm-password' => 'required|same:password',
        'name' => 'required|min:6',
        'email' => 'required|unique:users|email',
        'phone' => 'required|min:6',
        'address' => 'required|min:6',
        'fromadd' => 'required|min:6',
        'work' => 'required|min:6',
        'company' => 'required|min:6'

    );

    // Validate
    $validator = Validator::make(Input::all(),$validationRules);

    // If validation fails
    if ($validator->fails()) {

        // Redirect to UserController@getRegister
     return Redirect::to('user/register')
                        ->withErrors($validator)
                        ->withInput();

    } 

    // If validation passes
    else {

    		  // getting all of the post data
  	  $file = array('photo' => Input::file('photo'));
      // setting up rules

      $destinationPath = 'uploads'; // upload path
      $extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      Input::file('photo')->move($destinationPath, $fileName); // uploading file to given path

        // Insert new user
	        $user = new User;
	        $user->photo = $fileName ;
	        $user->username = Input::get('username');
	        $user->password = Hash::make(Input::get('password')); // Hash the plain password
	        $user->name = Input::get('name');
	        $user->email = Input::get('email');
	        $user->phone = Input::get('phone');
	        $user->address = Input::get('address');
	        $user->fromadd = Input::get('fromadd');
	        $user->work = Input::get('work');
	        $user->company = Input::get('company');
       	    $user->save();


        // Redirect to UserController@getLogin with message
      return Redirect::to('user/login')
                        ->withSuccess('User created. Now, you can login');
    }


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
 * Login a user
 *
 **/
public function postLogin()
{
    // Set validation rules
    $validationRules = array(
        'email' => 'required|email',
        'password' => 'required|min:6'
    );

    // Validate
    $validator = Validator::make(Input::all(),$validationRules);

    if ($validator->fails()) {

        // Redirect to UserController@getLogin
        return Redirect::to('user/login')
                        ->withErrors($validator)
                        ->withInput();

    } 

    // If validation passes
    else {

        // if login informations were correct
        if (Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'))
            ))
        {
            // Redirect to UserController@getLogin with message
            return Redirect::to('user/edit')
                        ->withSuccess('You are now logged in. Enjoy!');
        }

        // if login informations were incorrect
       return Redirect::to('user/login')
                        ->withError('Email or Password incorrect');
    }
}



     /**
     * Logout
     *
     **/
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('user/home');
    }


     /**
     * User Dashboard
     *
     **/
    public function getEdit()
    {   
        Auth::user()->email;
        return View::make('edit');
    }


    /**
     * Change Password User
     *
     **/
    public function postEdit()
    { 
    // Set validation rules
    $validationRules = array(
        'new-password' => 'required|min:6',
        'name' => 'required|min:6',
        'email' => 'required|unique:users|email',
        'phone' => 'required|min:6',
        'address' => 'required|min:6',
        'company' => 'required|min:6'

    );

    // Validate
    $validator = Validator::make(Input::all(),$validationRules);

    // If validation fails
    if ($validator->fails()) {

        // Redirect to UserController@getChangePassword
        return Redirect::to('user/edit')
                        ->withErrors($validator)
                        ->withInput();

    } 

    // If validation passes
    else {

        // Updat enew user
            $user = Auth::user();
            $user->password = Hash::make(Input::get('new-password')); // Hash the plain password
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->phone = Input::get('phone');
            $user->address = Input::get('address');
            $user->company = Input::get('company');
            $user->save();


        // Redirect to UserController@getLogin with message
        return Redirect::to('user/home')
                        ->withSuccess('User created. Now, you can login');
     }

  }

    /* Home page
     *
     **/
    public function getHome()
    {
           $keke = DB::table('users')->get();
        return View::make('home')->with('keke', $keke);
    }

    public function getDetail($id)
    {
       
       $currentuser = DB::table('users')->where('id', $id)->get();
       
       //  var_dump($ud);
       // dd();  

        return View::make('detail')->with('currentuser', $currentuser);
    }

    }