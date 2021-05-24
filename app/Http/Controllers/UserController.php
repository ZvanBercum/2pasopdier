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

    public function sitters(Request $request){
        $male = false;
        $female = false;
        $loc = $request->get('location');
        if($request->get('gender')){
            $genders = explode('-', request('gender'));
            if(in_array('male', $genders)){
                $male = true;
            }
            if(in_array('female', $genders)){
                $female = true;
            }
        }
        $sitters = User::whereIn('role', [1,2,4])
            ->when(request('location'), function ($query, $request) {
                   if(request('location') === 'noplace') {return;}else{
                       return $query->where('location', request('location'));
                   }
            })
            ->when(request('minage'), function($query, $request){
                return $query->whereBetween('age', [request('minage'), request('maxage')]);
            })
            ->when(request('gender'), function($query, $request){
                $genders = explode('-', request('gender'));
                return $query->wherein('gender',$genders);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $places = User::pluck('location');
        $minAge = User::min('age');
        $maxAge = User::max('age');
        return view('user.sitters',[
            'sitters' => $sitters,
            'places' => $places,
            'minage' => $minAge,
            'maxage' => $maxAge,
            'female' => $female,
            'male' => $male,
            'def_loc' => $loc
        ]);
    }
}
