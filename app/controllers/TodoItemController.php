<?php

class TodoItemController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', ['on'=> ['post', 'put', 'delete', 'patch']]);
		$this->beforeFilter('auth');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($list_id)
	{
		$todo_list = TodoList::findOrFail($list_id);
		return View::make('items.create')->withTodoList($todo_list);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($list_id)
	{
		$todo_list = TodoList::findOrFail($list_id);

		//Define rules for validation
		$rules = array(
			'content' => ['required', 'unique:todo_items', 'string']
			);

		// pass rules and input to validator class
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) 
		{	
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('todos.items.create', $list_id)->withErrors($validator)->withInput();	
		}

		$content = Input::get('content');
		$item = new TodoItem();
		$item->content = $content;
		$todo_list->listItems()->save($item);
		return Redirect::route('todos.show', $todo_list->id)->withMessage('Task was created! ');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $list_id
	 * @param  int  $item_id
	 * @return Response
	 */
	public function edit($list_id, $item_id)
	{
		$item = TodoItem::findOrFail($item_id);
		return View::make('items.edit')
			->withTodoListId($list_id)
			->withTodoItem($item);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $list_id
	 * @param  int  $item_id
	 * @return Response
	 */
	public function update($list_id, $item_id)
	{
		// return Input::all();
		//Define rules for validation
		$rules = array(
			'content' => ['required', 'unique:todo_items', 'string']
			);

		// pass rules and input to validator class/facade
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) 
		{	
			return Redirect::route('todos.items.edit',[ $list_id, $item_id])
				->withErrors($validator)
				->withInput();	
		}
		//Create a TodoItem object by find()
		$item = TodoItem::findOrFail($item_id);
		$item->content =  Input::get('content');
		$item->update();
		return Redirect::route('todos.show', $list_id)
			->withMessage('Item was updated! ');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $list_id
	 * @param  int  $item_id
	 * @return Response
	 */
	public function destroy($list_id, $item_id)
	{
		$item = TodoItem::findOrFail($item_id)->delete();
		return Redirect::route('todos.show', $list_id)
			->withMessage('Item deleted!');
	}

	/**
	 * Complete the item by adding a completion date
	 *
	 * @param  int  $list_id
	 * @param  int  $item_id
	 * @return Response
	 */
	public function complete($list_id, $item_id)
	{
		$item = TodoItem::findOrFail($item_id);
		$item->completed_on = date('Y-m-d H:i:s');
		$item->update();
		return Redirect::route('todos.show', $list_id)
			->withMessage('Item completed');
	}
}
