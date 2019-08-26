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

    public function educationCert()
    {
        return $this->belongsTo(Certificate::class, 'certificate_id');
    }

}
