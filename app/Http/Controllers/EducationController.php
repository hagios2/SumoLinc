<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Education;
use App\Http\Requests\EducationFormRequest;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allcert = Certificate::all();

        return view('profiles.education.create', compact('allcert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationFormRequest $request)
    {

        Education::create([

            'user_id' => auth()->id(),

            'school' => $request->school,

            'program' => $request->program,

            'certificate_id' => $request->cert,

            'startDate' => $request->start_date,

            'TillDate' => $request->currently_enrolled ?? null,

            'completionDate' => $request->completion_date ?? null,
        ]);


        return redirect('/profile')->withSuccess('Education History added');
    }

    /**
    }
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        abort_if($education->user_id !== auth()->id(), 403);

        $allcert = Certificate::all();

        return view('profiles.education.edit', compact('allcert', 'education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(EducationFormRequest $request, Education $education)
    {
        abort_if($education->user_id !== auth()->id(), 403);

        $education->update([

            'school' => $request->school,

            'program' => $request->program,

            'certificate_id' => $request->cert,

            'startDate' => $request->start_date,

            'TillDate' => $request->currently_enrolled ?? null,

            'completionDate' => $request->completion_date ?? null,
        ]);


        return redirect('/profile')->withSuccess('Education History updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        abort_if($education->user_id !== auth()->id(), 403);
        
        $education->delete();

        return redirect('/profile')->withSuccess('You removed an Educational background successfully');
    }
}
