<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function progress_percent()
    {
        $completed = $this->tasks->whereNotNull('completion_date')->count();
        $total = $this->tasks->count();

        if($completed == 0 || $total == 0)
            return $completed;
        
        return round($completed / $total * 100);
    }
}
