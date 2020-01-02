<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sale;
use App\worker;
use App\type;

class post extends Controller
{
    public function postSale($idType,$idWorker){
        $sale = new sale();
        $sale->worker_id = $idWorker;
        $sale->type_id = $idType;
        $sale->save();
        return redirect('/');
    }
    public function uploadImage(){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',

        ]);



        $imageName = time().'.'.request()->image->getClientOriginalExtension();



        request()->image->move('public/images', $imageName);
        $worker = new worker();
        $worker->name = request()->name;
        $worker->username = request()->username;
        $worker->photo = $imageName;
        $worker->save();
        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);
    }
    public function typeUpload(){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',

        ]);



        $imageName = time().'.'.request()->image->getClientOriginalExtension();



        request()->image->move('public/images', $imageName);
        $type = new type();
        $type->name = request()->name;
        $type->price = request()->price;
        $type->photo = $imageName;
        $type->save();
        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);
    }
}
