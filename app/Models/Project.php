<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['pname', 'description', 'start_date', 'end_date', 'items_required'];

    // A project has many reports
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // A project can have multiple donation histories
    public function donations()
    {
        return $this->hasMany(DonationHistory::class);
    }
}
