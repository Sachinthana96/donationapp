<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'content'];

    // A report belongs to a project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}