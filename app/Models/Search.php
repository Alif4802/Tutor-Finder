<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        'user_id', 'subject', 'education_background', 'location'
        // Add other fillable fields here
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Add any custom methods or logic related to the Search model here
}
