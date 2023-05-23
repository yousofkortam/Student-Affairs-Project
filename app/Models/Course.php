<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'department_id',
        // Add other relevant attributes here
    ];

    /**
     * Get the department associated with the course.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the professor teaching the course.
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    /**
     * Get the students enrolled in the course.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id');
    }

    /**
     * Get the lectures associated with the course.
     */
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    /**
     * Get the assignments associated with the course.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the prerequisites for the course.
     */
    public function prerequisites()
    {
        return $this->belongsToMany(Course::class, 'prerequisites', 'course_id', 'prerequisite_id');
    }
}
