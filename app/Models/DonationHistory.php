<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationHistory extends Model
{
    use HasFactory;

    protected $fillable = ['donor_id', 'project_id', 'donation_date'];

    // A donation belongs to a donor (user)
    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id');
    }

    // A donation belongs to a project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}