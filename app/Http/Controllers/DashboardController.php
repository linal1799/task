<?php

namespace App\Http\Controllers;
use  Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class DashboardController extends Controller
{
   public function index(){
       $user_info = Auth::user();
       $country= Country::find($user_info->country_id);
       $state=State::find($user_info->state_id);
       $city= City::find($user_info->city_id);
       return view ('dashboard',compact('user_info','country','state','city'));
   }
}
