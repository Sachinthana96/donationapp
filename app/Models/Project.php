<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['pname', 'description', 'start_date', 'end_date', 'items_required', 'status'];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // public function donations()
    // {
    //     return $this->hasMany(DonationHistory::class);
    // }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            $project->items()->delete();
        });
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
