<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use PragmaRX\Countries\Package\Countries;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Response;


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

            $summary = $user->profile->summary;

            return view('profiles.profile.index', compact('summary', 'user'));

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

       return view('profiles.profile.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileFormRequest $request)
    {

        $this->updateUser($request->name, $request->email);

        Profile::create([

        'user_id' => auth()->id(),

        'summary' => $request->summary,

        'birthdate' => $request->date,

        'country' => $request->country ?? null,

        'state' => $request->state ?? null,

       ]);

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
        /* $this->authorize('update', $profile); */

       abort_if($profile->user_id  !== auth()->id(), 403);

        $countries = new Countries();

        $allcountries = $countries->all()->pluck('name.common');

        return view('profiles.profile.edit', compact('profile', 'allcountries'));
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
        abort_if($profile->user_id  !== auth()->id(), 403);

        $this->updateUser($request->name, $request->email);

        $profile->update([

            'summary' => $request->summary,

            'BirthDate' => $request->date,

            'country' => $request->country,

            'State' => $request->state,

        ]);

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
        abort_if($profile->user_id  !== auth()->id(), 403);

        $profile->delete();

        return redirect('/')->withSuccess('Profile has been deleted');
    }


    public function updateUser($new_name, $new_email)
    {
        if(auth()->user()->name !== $new_name || auth()->user()->email !== $new_email )
        {
            auth()->user()->update([

                'name' => $new_name,

                'email' => $new_email,
            ]);
        }


    }

}
