<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
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
     * Get the user associated with the professor.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the department associated with the professor.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the courses taught by the professor.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
