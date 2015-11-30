<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'TodoListController@index'); 
// Route::get('/todos', "TodoListController@index");
// Route::get('/todos/{id}', 'TodoListController@show'); 

Route::resource('todos', 'TodoListController');
Route::resource('todos.items', 'TodoItemController', ['except' => ['index','show']]);
Route::patch('/todos/{todos}/items/{items}/complete',
		['as'=>'todos.items.complete', 'uses'=>'TodoItemController@complete']);

Route::get('/register', ['as' => 'register', 'uses'=> 'RegisterController@showRegister']);
Route::post('/register', ['as' => 'register.store', 'uses'=> 'RegisterController@doRegister']);

Route::get('/login', function(){
	return View::make('login');
});

Route::post('/login', function(){

	//Define rules for validation
		$rules = array(
			'username' => ['required', 'string'],
			'password' => ['required']
			);

		// pass rules and input to validator class
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) 
		{	
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::to('login')->withErrors($validator)->withInput();	
		}

	$credentials = Input::only('username', 'password');
	if(Auth::attempt($credentials)){
		return Redirect::intended('/');
	}
	return Redirect::to('login');
});

Route::get('/logout',  array('as'=> 'logout',function()
{
	Auth::logout();
	return View::make('logout');
}
));

//checking DB connection
// Route::get('/db', function()
// { return DB::select('select database();');
// 	// return DB::select('show tables');
// });

// Evet listenning useful for debugging here
// Event::listen('illuminate.query', function($query){
// 	var_dump($query);
// });

