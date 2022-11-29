<?php

namespace App\Http\Controllers;

use App\Models\Todo;
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
        $todo = Todo::orderBy("id","desc")->paginate(25);
        return view("page.index", ["title" => "Homepage", "todo" => $todo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("page.create", ["title" => "Create Todo"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = $request->validate(
            [
                "todo" => "required|min:3|max:20"
            ]
        );
        Todo::insert(
            [
                "todo" => $v['todo']
            ]
        );
        return redirect("/");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view("page.update", ["title" => "Update Todo","todo"=>$todo->todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = $request->validate(
            [
                "todo"=>"required|min:3|max:20"
            ]
            );
        $todo = Todo::find($id)->update(
            [
                "todo"=>$v['todo']
            ]
        );
        if (!$todo) {
            return back()->with(['error'=>'Update failed!']);
        } else {
            return redirect("/");
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id)->delete();
        if (!$todo) {
            return back()->with(['error'=>'Delete failed!']);
        } else {
            return redirect("/");
        }
    }
    public function search(Request $request)
    {
        if ($request->todo == null) {
            return redirect("/");
        }
        $name = $request->todo;
        $todo = Todo::where("todo","like","%$name%")->get();
        return view("page.index",['title'=>"Search","todo"=>$todo,"search"=>$request->todo]);
    }
}
