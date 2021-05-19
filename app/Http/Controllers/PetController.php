<?php

namespace App\Http\Controllers;

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

    public function pets(){
        $pets = Pet::orderBy('created_at', 'desc')->get();
        return view('pet.pets',[
            'pets' => $pets
        ]);
    }
}
