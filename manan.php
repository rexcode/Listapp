<?php 
Hi,
I saw your code and the demo on Heroku. I am sending you these changes (not tested). This should give you a direction on what additional logic needs to be added.

1. Adding User reference to the Todo.

Migration for Todo List table:

Schema::create('todo_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('user_id')->unsigned();
                        $table->foreign('user_id')->references('id')->on('users');
			$table->timestamps();
		});

2. Adding Relationship between TodoList and User in models.

Todo model:

public function user(){
 
        return $this->belongsTo('User');
}

Likewise hasMany to User


3. Adding User Auth check and references for Todo Controller.
I have modified for two functions. You can replicate for others.

TodoListController:

public function index()
{	
	if(Auth::check()) {
		$todo_lists = TodoList::where('user_id','=',Auth::user()->id)->get();   //Note: If its Laravel 4.2+ I guess user id can be fetched as Auth::id. I am not sure so you'll have to test
		return View::make('todos.index')->with('todo_lists', $todo_lists);
	}
		
}


public function store()
	{
		//Define rules for validation
		$rules = array(
			'name' => ['required', 'unique:todo_lists', 'string']
			);
		// pass rules and input to validator class
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		if ($validator->fails()) 
		{	
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('todos.create')->withErrors($validator)->withInput();	
		}
		$name = Input::get('name');
		$list = new TodoList();
		$list->name = $name;
		$list->user_id = Auth::user()->id;
		$list->save();
		return Redirect::route('todos.index')->withMessage('List was created! ');
	}



I have copied the code from your github codebase. Changes that I have added are marked in red. I have not tested the codes due to lack of time. Just typed in notepad. Could be error prone but it'll help get a direction.


A couple of suggestions (all of them purely from backend. Haven't put a thought on frontend):

1. Add more filters for exception handling. For example, we know that Todo won't be accessed before Auth but its better to check Auth in all functions. 
2. Avoid numeric IDs in URL. Add slug in the table and there is a way to create Slug in Laravel. Use that.
3. Avoid business logic in routes ( for ex login). Moreover, you can add the authentication and authorization logic in the UserController itself.
4. Surround codes with try-catch and ensure the code doesn't break anywhere.
5. Improvising on filters like if you checking update TodoList, also ensure if the Auth id is of the owner of Todolist.

Let me know if any other concern.


Thanks,
Manan
