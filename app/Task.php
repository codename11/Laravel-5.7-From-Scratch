<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{/*Definise se u kojim poljima 
    u tabeli task je dozvoljen upis.*/
    protected $fillable = [
        "project_id",
        "description",
        "completed"
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function complete($completed = true){

        $this->update(compact("completed"));
        /*$this->update([
            "completed" => true
        ]);*/

    }

    public function incomplete($completed = false){

        //$this->update(["completed" => false]);
        $this->complete(false);

    }

}
