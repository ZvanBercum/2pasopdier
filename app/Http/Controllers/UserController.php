<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Pet;
use Auth;
use DateTime;

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

    public function edit(){
        return view('user.edit',[
            'user' => User::findOrFail(Auth::user()->id)
        ]);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $setAge = false;
        echo($user);
        foreach($request->all() as $name => $newValue){
            switch ($name){
                case 'age_day':
                case 'age_month':
                case 'age_year':
                    if($setAge)break;
                    $date = sprintf("%02d", $request->age_day).'-'.sprintf("%02d", $request->age_month).'-'.$request->age_year;
                    $timestamp = strtotime($date);
                    $user->age =date("Y-m-d", $timestamp);
                    $setAge = true;

                    break;
                default:
                    echo($name);
                    if(isset($user[$name])){
                        if(!is_null($newValue) && $user[$name] != $newValue){
                            $user[$name] = $newValue;
                        }
                    }
                    break;
            }
        }
        $user->save();
        return redirect()->route('user.show', $user->id);
    }

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
                $now = Carbon::now();
                $maxYear =($now->year - request('minage')).'-01-01';
                $minYear =($now->year - request('maxage')-1).'-01-01';
                return $query->whereBetween('age', [$minYear, $maxYear]);
            })
            ->when(request('gender'), function($query, $request){
                $genders = explode('-', request('gender'));
                return $query->wherein('gender',$genders);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $places = User::pluck('location');
        $minAge = User::min('age');
        $date = new DateTime($minAge);
        $now = new DateTime();
        $minAge = $now->diff($date)->y;
        $maxAge = User::max('age');
        $date = new DateTime($maxAge);
        $now = new DateTime();
        $maxAge = $now->diff($date)->y;
        return view('user.sitters',[
            'sitters' => $sitters,
            'places' => $places,
            'minage' => $maxAge,
            'maxage' => $minAge,
            'female' => $female,
            'male' => $male,
            'def_loc' => $loc
        ]);
    }
}
