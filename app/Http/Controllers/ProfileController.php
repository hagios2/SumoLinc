<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use PragmaRX\Countries\Package\Services\Countries as PragmaRXCountries;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->profile)
        {
            $user = auth()->user();

            $summary = auth()->user()->profile->summary;

            $education = auth()->user()->education->orderBy('created_at', 'DESC')->get();

            return view('profiles.profile.index', compact('summary', 'education', 'user'));

        }else{

            return redirect('/profile/create');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = new PragmaRXCountries();

        $allcountries = $countries->all();

        return view('profiles.profile.create', compact('allcountries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileFormRequest $request)
    {
       auth()->user()->createProfile($request);

       return redirect('/profile')->withSuccess('Profile was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.profile.edit', compact($profile));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileFormRequest $request, Profile $profile)
    {
        $profile->update([$request->all()]);

        return back()->withSuccess('Profile has been updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('/')->withSuccess('Profile has been deleted');
    }
}
