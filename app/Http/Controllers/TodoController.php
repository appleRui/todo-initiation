<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
    }
    public function create(TodoRequest $request)
    {
        $new_todo = new Todo;
        $form = $request->all();
        unset($form['_token_']);
        $new_todo->fill($form)->save();
        return redirect('/');
    }
    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
