<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
"name", "description"
    ];
    /**
     * Récupère les utilisateurs possédant cette compétence
     */
     public function users()
     {
	return $this->belongsToMany('App\User')->withPivot('level');
     }
}

