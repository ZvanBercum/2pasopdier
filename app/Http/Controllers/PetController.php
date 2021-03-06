<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Models\User;
use App\Models\Review;
use App\Models\Petrequest;
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
        $pet = Pet::findOrFail($id);
        if($pet->owner_id === Auth::user()->id){
            $pet->requests = Petrequest::where('owner_id', Auth::user()->id)->get();
        }
        return view('pet.show',[
            'pet' => $pet,
        ]);

    }

    public function owner(){
        return view('pet.owner',[
            'user' => User::findOrFail(Auth::user()->id)
        ]);
    }

    public function sitter(){
          return view('pet.sitter',[
            'pets' => Pet::where('sitter_id', Auth::user()->id)->get()
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
        $table = Schema::getColumnListing($pet->getTable());
        foreach($request->all() as $name => $newValue){
            if(!in_array($name, $table))continue;
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

    public function accept($id){
        $pet = Pet::findOrfail($id);
        if($pet->user->id === Auth::user()->id){
            return redirect()->back()->with(['status' => 'Je kan niet je eigen huisdier aannemen']);
        }
        $req = new Petrequest();
        $req->sitter_id = Auth::user()->id;
        $req->owner_id = $pet->user->id;
        $req->pet_id = $pet->id;
        $req->accepted = false;
        $req->save();
        return redirect()->back()->with(['status' => 'Huisdier aangenomen']);
    }

    public function owner_accept($req_id){
        $req = Petrequest::findOrFail($req_id);
        $req->accepted = true;
        $pet = Pet::findOrFail($req_id->pet_id);
        $pet->sitter_id = $req->sitter_id;
        $pet->save();
        $req->save();
        return redirect()->back()->with(['status' => 'Oppasser aangenomen']);
    }

    public function review(Request $request, $id){
        $pet = Pet::findOrFail($id);
        $review = new Review;
        $review->user_id = $pet->user->id;
        $review->reviewer_id = Auth::user()->id;
        $review->rating = $request->get('rating');
        $review->save();
        $pet->sitter_id = null;
        $pet->save();
        return redirect()->back()->with(['status' => 'Huisdier reviewed en verwijderd']);
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

