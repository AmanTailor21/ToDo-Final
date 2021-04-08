<?php

namespace App\Http\Controllers;

use App\Events\MailEvent;
use App\Interfaces\TodoRepositoryInterface;
use App\Mail\sendmail;
use App\Models\todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository=$todoRepository;
    }

    public function index()
    {
        $todo=todo::all();
        return $todo;
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
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'due_date'=>'required',
            'notes'=>'required'
        ]);
        $data = [
            "title" => $request->title,
            "start_date"=>$request->start_date,
            "due_date"=>$request->due_date,
            "notes"=>$request->notes
        ];
        $data = $this->todoRepository->save($data);
        MailEvent::dispatch($data);
        if ($data) {
            Alert::success('Data Add Successfully', 'Task Add Successfully Check Your Mail');
            return back();
        }
        else
        {
            Alert::error('upsss', 'Your Task is Not Added Try Again');
            return back();
        }
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
        return $todos;
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


            $array = [
                "title" => $request->title,
                "start_date"=>$request->start_date,
                "due_date"=>$request->due_date,
                "notes"=>$request->notes,
            ];
            if($request->mark == "on")
            {
                $array["mark"] = 1;
            }else{
                $array["mark"] = 0;
            }
            $data=$this->todoRepository->update($array,$request->route("id"));

        if($data){
            if($request->has('mark')){
                $data->mark = true;
            }else{
                $data->mark = false;
            }
            return back()->with('msg','Task Update Sucessfully');
        }
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
    public function important(Request $request)
    {
        $todo = todo::find($request->route("id"));
        if($todo->important === 1)
            $todo->important = 0;
        else
            $todo->important = 1;
        $todo->save();
        return $todo;
    }
    public function getsearchdata(Request $request)
    {
       return $data=$this->todoRepository->getsearchdata( $request->search);
    }
}
