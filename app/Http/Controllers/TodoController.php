<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $todo=todo::all();
        $action = "/store";
        return view("layouts.templates",compact('todo',"action"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'due_date'=>'required',
            'notes'=>'required'
        ]);
        $todo=new todo();
        $todo->title=$request->title;
        $todo->start_date=$request->start_date;
        $todo->due_date=$request->due_date;
        $todo->notes=$request->notes;
        $todo->save();
        return back()->with('msg','Task Add Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param todo $todo
     * @return Response
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param todo $todo
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(todo $todo,Request $request)
    {
        $todos = todo::find($request->route("id"));
        $todo=todo::all();
        $action = "/edit/".$request->route("id");
        return view("layouts.templates",compact("todos","todo","action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'due_date'=>'required',
            'notes'=>'required'
        ]);
        $todo = todo::find($request->route("id"));
        $todo->title=$request->title;
        $todo->start_date=$request->start_date;
        $todo->due_date=$request->due_date;
        $todo->notes=$request->notes;
        if($request->has('mark')){
            $todo->mark = true;
        }else{
            $todo->mark = false;
        }
        $todo->save();
        return back()->with('msg','Task Update Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param todo $todo
     * @return Response
     */
    public function destroy(todo $todo)
    {
        //
    }
}
