<?php

namespace App\Http\Controllers;

use App\Models\todo_list;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //
    public function index()
    {
        return view('view_list')->with('todo_arr',todo_list::all());
    }

    public function create(){
        return view('create_new_list');
        
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'completed' => 'required',
        ]);
// $request->input('title');
$todo = new todo_list();
$todo->title = $request->input('title');
$todo->description = $request->input('description');
$todo->completed = $request->input('completed');
$todo->save();
return redirect('/');

    }

    public function show(todo_list $todo_list)
    {
        //
    }

    public function edit(todo_list $todo_list, $id)
    {
        //
        $todo = todo_list::find($id);
        return view('edit_list')->with('todo_arr',$todo);

    }

    public function update(Request $request, todo_list $todo_list, $id)
    {

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'completed' => 'required',
        ]);

        $todo = todo_list::find($id);
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->completed = $request->input('completed');
        $todo->save();
        return redirect('/');
    }

    public function destroy(todo_list $todo_list, $id)
    {
        //
        $row = todo_list::destroy($id);
        // $row->destroy();
        return redirect('/');
    }

}
