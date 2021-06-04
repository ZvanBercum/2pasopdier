<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Models\Pet;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;


class PetController extends Controller {
    use UploadTrait;

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

    public function add(){
        return view('pet.add',
            ['types' => $this->getTypes()]);

    }

    public function store(Request $request){
        $request->validate([
            'pref_picture'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $pet = new Pet;
        $pet->owner_id = Auth::user()->id;
        $pet->active = true;
        $table = Schema::getColumnListing($pet->getTable());
        foreach($request->all() as $name => $value){
            if(!in_array($name, $table))continue;
            if ($name == 'pref_picture') {
                $image = $request->file('pref_picture');
                $name = Str::slug($request->input('name')) . '_' . time();
                $folder = '/uploads/images/';
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $pet->pref_picture = $filePath;
            }else{
                $pet[$name] = $value;

            }
        }
        $pet->save();
        return redirect()->route('pet.show', $pet->id)->with(['status' => 'Huisdier is toegevoegd!']);
    }

    public function edit($id){
        return view('pet.edit',[
            'pet' => Pet::findOrFail($id),
            'types' => $this->getTypes()
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'pref_picture'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $pet = Pet::findOrFail($id);
        foreach($request->all() as $name => $newValue){
            if(isset($pet[$name])){
                if(!is_null($newValue && $pet[$name] != $newValue)) {
                    if ($name == 'pref_picture') {
                        $image = $request->file('pref_picture');
                        $name = Str::slug($request->input('name')) . '_' . time();
                        $folder = '/uploads/images/';
                        $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                        $this->uploadOne($image, $folder, 'public', $name);
                        $pet->pref_picture = $filePath;
                    }else{
                        $pet[$name] = $newValue;

                    }
                }
            }
        }
        $pet->save();
        return redirect()->route('pet.show', $pet->id)->with(['status' => 'Profiel is aangepast!']);
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

    private function getTypes(){
        $type_old = PetType::get(['id','name']);
        $types = [];
        foreach($type_old as $object){
            $types[$object['id']] = $object['name'];
        }
        return $types;
    }

}

