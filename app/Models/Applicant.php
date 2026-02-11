<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;

class Applicant extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'job_post_id',
        'name',
        'email',
        'status'
    ];

    /**
     * An Applicant belongs to a Job Post
     */
    public function jobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }
}
