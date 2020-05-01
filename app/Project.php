<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title'];

    public function tasks(){
        return $this->hasMany(Task::class, 'project_id');
    }
}
