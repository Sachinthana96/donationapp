<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['recived_quntity', 'total_price', 'status', 'user_id', 'project_id', 'item_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
