<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pet;
use Auth;


class PetController extends Controller {

    public function index(){
        return view('pet.index',[
            'pets' => Pet::all()
        ]);
    }

    public function show($id){
        return view('pet.show',[
            'pet' => Pet::findOrFail($id)
        ]);

    }

    public function owner(){
        return view('pet.owner',[
            'user' => User::findOrFail(Auth::user()->id)
        ]);
    }

    public function edit($id){
        $type_old = PetType::get(['id','name']);
        $types = [];
        foreach($type_old as $object){
            $types[$object['id']] = $object['name'];
        }
        return view('pet.edit',[
            'pet' => Pet::findOrFail($id),
            'types' => $types
        ]);
    }

    public function update(Request $request, $id){
//        $user = User::findOrFail($id);
//        $setAge = false;
//        echo($user);
//        foreach($request->all() as $name => $newValue){
//            switch ($name){
//                case 'age_day':
//                case 'age_month':
//                case 'age_year':
//                    if($setAge)break;
//                    $date = sprintf("%02d", $request->age_day).'-'.sprintf("%02d", $request->age_month).'-'.$request->age_year;
//                    $timestamp = strtotime($date);
//                    $user->age =date("Y-m-d", $timestamp);
//                    $setAge = true;
//
//                    break;
//                default:
//                    echo($name);
//                    if(isset($user[$name])){
//                        if(!is_null($newValue) && $user[$name] != $newValue){
//                            $user[$name] = $newValue;
//                        }
//                    }
//                    break;
//            }
//        }
//        $user->save();
//        return redirect()->route('user.show', $user->id);
    }


    public function delete($id){

    }

    public function pets(Request $request){
        $loc = $request->get('location');
        $type = $request->get('type');
        $pets = Pet::with('User')
        ->when(request('type'), function($query, $request){
            if(request('type') === 'notype'){return;}else{
                return $query->where('type_id', request('type'));
            }
        })
        ->when(request('location'), function ($query, $request) {
            if(request('location') === 'noplace') {return;}else{
                return $query->whereHas('User', function($q){
                    $q->where('location', request('location'));
                });
            }
        })
        ->orderBy('created_at', 'desc')
        ->get();
        $places = User::pluck('location');
        $types = PetType::pluck('name','id');
        return view('pet.pets',[
            'pets' => $pets,
            'places' => $places,
            'types' => $types,
            'def_loc' => $loc,
            'def_type' => $type
        ]);
    }
}

