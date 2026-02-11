<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;

class JobPost extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'title',
        'company',
        'description',
        'location',
        'salary'
    ];

    /**
     * A Job Post can have many Applicants
     * Explicit foreign key is IMPORTANT
     */
    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'job_post_id');
    }
}
