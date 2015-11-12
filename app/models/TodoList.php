<?php
class TodoList extends Eloquent {
	
	public function listItems()
	{
		return $this->hasMany('TodoItem');
	}

	// public function todoList()
	// {
	// 	return $this->belongsTo('User');
	// }

	public function delete()
	{
		TodoItem::where('todo_list_id', $this->id)->delete();
		parent::delete();
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}