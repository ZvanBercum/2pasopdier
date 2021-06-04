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


class PetrequestController extends Controller {
    use UploadTrait;

    public function accept($id){
        $req = Petrequest::findOrFail($id);
        $req->accepted = true;
        $pet = Pet::findOrFail($req->pet_id);
        $pet->sitter_id = $req->sitter_id;
        $req->save();
        $pet->save();
        return redirect()->back()->with(['status' => 'Verzoek aangenomen']);
    }

    public function delete($id){
        $req = Petrequest::findOrFail($id);
        $req->delete();
        return redirect()->back()->with(['status' => 'Verzoek verwijderd']);
    }

}

