<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;
use App\worker;
use App\sale;
class get extends Controller
{
    public function getTypes(){
        $type = type::all();
        return view('welcome')->with(compact('type'));
    }
    public function getUser($id){
        $worker = worker::all();
        return view('user',['id' => $id])->with(compact('worker'));
    }
    public function getData(){
        $data = \DB::select("select s.created_at, u.name as Vendedor, t.name from sales s join workers u join types t where u.id = s.worker_id and t.id = s.type_id");
        return $data;
    }
    public function getTables(){
        $worker = worker::all();
        $sales = sale::all();
        $type = type::all();
        return view('table')->with(compact('worker'))->with(compact('sales'))->with(compact('type'));

    }
}
