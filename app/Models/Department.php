<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the courses associated with the department.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get the professors associated with the department.
     */
    public function professors()
    {
        return $this->hasMany(Professor::class);
    }

    /**
     * Get the students associated with the department.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
