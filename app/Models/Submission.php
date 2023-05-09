<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'assignment_id',
        'student_id',
        'file_path',
        'submitted_at',
        // Add other relevant attributes here
    ];

    /**
     * Get the assignment associated with the submission.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the student associated with the submission.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
