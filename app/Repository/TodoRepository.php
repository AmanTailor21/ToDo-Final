<?php


namespace App\Repository;


use App\Interfaces\TodoRepositoryInterface;
use App\Models\todo;

class TodoRepository implements TodoRepositoryInterface
{
    private $todo;
    public function __construct(todo $todo)
    {
        $this->todo=$todo;
    }
    public function save($data)
    {
        $this->todo->title=$data["title"];
        $this->todo->start_date=$data["start_date"];
        $this->todo->due_date=$data["due_date"];
        $this->todo->notes=$data["notes"];
        if ($this->todo->save()){
            return $this->todo;
        }else{
            return false;
        }
    }
    public function update($array, $id)
    {
        $this->todo = $this->todo::find($id);
        $this->todo->title=$array["title"];
        $this->todo->start_date=$array["start_date"];
        $this->todo->due_date=$array["due_date"];
        $this->todo->notes=$array["notes"];
        $this->todo->mark=$array["mark"];
        if ($this->todo->save()){
            return $this->todo;
        }else{
            return false;
        }
    }

    public function getsearchdata($str)
    {
        return $this->todo::where("title","LIKE","%{$str}%")->orwhere("notes","LIKE","%{$str}%")->get();
    }
}
