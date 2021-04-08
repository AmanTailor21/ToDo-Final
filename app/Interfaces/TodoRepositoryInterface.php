<?php


namespace App\Interfaces;


interface TodoRepositoryInterface
{
    public function save($data);
    public function update($array,$id);
    public function getsearchdata($str);
}
