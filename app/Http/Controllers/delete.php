<?php

namespace App\Http\Controllers;

use App\worker;
use Illuminate\Http\Request;
use DB;
class delete extends Controller
{
    public function deleteWorker($id){
        DB::delete('delete from workers where id = ?', [$id]);
        return redirect()->back();
    }
    public function deleteSale($id){
        DB::delete('delete from sales where id = ?', [$id]);
        return redirect()->back();
    }
    public function deleteType($id){
        DB::delete('delete from types where id = ?', [$id]);
        return redirect()->back();
    }
}
