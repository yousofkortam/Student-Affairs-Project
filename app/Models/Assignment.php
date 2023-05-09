<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'deadline',
        // Add other relevant attributes here
    ];

    /**
     * Get the course associated with the assignment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
