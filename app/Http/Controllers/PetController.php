<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pet;

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

    public function edit($id){

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

