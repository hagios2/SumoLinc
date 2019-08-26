<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceFormRequest;
use App\WorkingExperience;
use Illuminate\Http\Request;

class WorkingExperienceController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceFormRequest $request)
    {
        WorkingExperience::create([

            'user_id' => auth()->id(),

            'company' => $request->company,

            'position' => $request->position,

            'location' => $request->location,

            'summary' => $request->summary,

            'startDate' => $request->start_date,

            'currentRole' => $request->current_employee ?? null,

            'completionDate' => $request->completion_date ?? null,

        ]);


        return redirect('/profile')->withSuccess('Experience Added');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingExperience $workingExperience)
    {
        abort_if( $workingExperience->user_id !== auth()->id(), 403);

        return view('profiles.experiences.edit', compact('workingExperience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceFormRequest $request, WorkingExperience $workingExperience)
    {


        abort_if( $workingExperience->user_id !== auth()->id(), 403);

        $workingExperience->update([

            'company' => $request->company,

            'position' => $request->position,

            'location' => $request->location,

            'summary' => $request->summary,

            'startDate' => $request->start_date,

            'currentRole' => $request->current_employee ?? null,

            'completionDate' => $request->completion_date ?? null,

        ]);

        return redirect('/profile')->withSuccess('Experience updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingExperience $workingExperience)
    {
        abort_if( $workingExperience->user_id !== auth()->id(), 403);

        $workingExperience->delete();

        return redirect('/profile')->withSuccess('Experience deleted');
    }
}
