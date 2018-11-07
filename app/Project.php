<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /*U ovoj klasi se belezi ime tabele, polja za ajdi 
    i to da li ce biti tajmstempa.*/
    // Table name
    protected $table = "projects";
    // Primary key
    public $primaryKey = "id";
    // Timestamp
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    /*Ovime se odredjuje koja polja u bazi su dozvoljena za upis.*/
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
