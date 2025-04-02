<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'quantity',
        'available_quantity',
        'unit_price',
        'type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
