<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Pet;
use Auth;

class UserController extends Controller {

    public function dashboard(){
        $newestLimit = 15;
        $sitters = User::whereIn('role', [1,2,4])->orderBy('created_at', 'desc')->take($newestLimit)->get();
        $pets = Pet::orderBy('created_at', 'desc')->take($newestLimit)->get();
        return view('dashboard', [
            'sitters'=> $sitters,
            'pets' => $pets
            ]
       );
    }

    public function show($id){
        return view('user.show',[
            'user' => User::findOrFail($id)
        ]);
    }
//    public function index(){
//        return view('user.index',[
//            'users' => User::all()
//        ]);
//    }
//
//    public function show($id){
//        return view('user.show',[
//            'user' => User::findOrFail($id)
//        ]);
//    }
//
//    public function edit($id){
//        return view('user.edit',[
//            'user' => User::findOrFail($id)
//        ]);
//    }

    public function sitters(){
        $sitters = User::whereIn('role', [1,2,4])->orderBy('created_at', 'desc')->get();
        return view('user.sitters',[
            'sitters' => $sitters
        ]);
    }
}
