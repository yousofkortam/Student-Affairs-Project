<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enrollment_id',
        'professor_id',
        'value',
        'active',
        // Add other relevant attributes here
    ];

    /**
     * Get the enrollment associated with the degree.
     */
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    /**
     * Get the professor associated with the degree.
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
