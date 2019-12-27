<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sale;
class post extends Controller
{
    public function postSale($idType,$idWorker){
        $sale = new sale();
        $sale->worker_id = $idWorker;
        $sale->type_id = $idType;
        $sale->save();
        return redirect('/');
    }
}
