<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [

        'user_id', 'school', 'program', 'certificate_id', 'startDate', 'TillDate', 'completionDate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addEducation($attributes)
    {
        $this->user()->create([

            'school' => $attributes->school,

            'program' => $attributes->cert,

            'startDate' => $attributes->start_date,

            'TillDate' => $attributes->currently_enrolled ?? null,

            'completionDate' => $attributes->complettionDate ?? null,
        ]);
    }
}
