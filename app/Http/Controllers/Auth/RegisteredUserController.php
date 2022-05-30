<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['countries'] = Country::get(["name", "id"]);

        return view('auth.register',$data);
    }



    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
