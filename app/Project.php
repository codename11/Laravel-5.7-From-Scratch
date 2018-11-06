<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        "title",
        "description"
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($validated){

        $this->tasks()->create($validated);
        /*return Task::create([
            "project_id" => $this->id, 
            "description" => $description
        ]);*/
        
    }

}
