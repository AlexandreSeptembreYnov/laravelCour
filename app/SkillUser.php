<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    protected $fillable = [
        'skill_id', 'user_id', 'level'
    ];
    protected $table = "skill_user";
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
}
