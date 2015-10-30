<?php

class RegisterController extends \BaseController {

	public function showRegister()
	{	
		return View::make('register');
	}

	public function doRegister()
	{
		$rules = array(
			'email' => ['required', 'unique:users', 'email', 'string'],
			'username' => ['required', 'unique:users', 'string'],
			'password' => ['required']
		);

		// pass rules and input to validator class
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) 
		{	
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('register')
				->withErrors($validator)
				->withInput();	
		}

		$user = new User;
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return Redirect::route('todos.index')->withMessage('You have registered!');
	}

}
