<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new Todo;
        $res->name=$request->input('name');
        $res->price=$request->input('price');
        $res->save();
        $request->session()->flash('msg','Data submitted');
        return redirect('todo_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
//        $visible =(array)null;
//        $visible = collect($visible)->where('deleted', 0)->all();
//        $deleted =(array)null;
//        $deleted = collect($deleted)->where('deleted', 1)->all();
//        return view('todo_show')->with('todoArr', $visible);
        $visible = Todo::where('deleted', '=', '0')->get();
        $deleted = Todo::where('deleted', '=', '1')->get();
        return view('todo_show')->with('todoArr', $visible)->with('deleted', $deleted);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */

    public function edit(Todo $todo, $id)
    {
        return view('todo_edit')->with('todoArr', Todo::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $res = Todo::find($request->id);
        $res->name=$request->input('name');
        $res->save();
        $request->session()->flash('msg','Data Updated');
        return redirect('todo_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo, $id)
    {
        Todo::destroy(array('id', $id));
        return redirect('todo_show');
    }
    public function delete(Request $request, Todo $todo, $id)
    {
        $res = Todo::find($request->id);
        $res->deleted= '1';
        $res->save();
        return redirect('todo_show');
    }
    public function restore(Request $request, Todo $todo, $id)
    {
        $res = Todo::find($request->id);
        $res->deleted= '0';
        $res->save();
        return redirect('todo_show');
    }
}
