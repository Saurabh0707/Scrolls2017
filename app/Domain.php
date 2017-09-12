<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;

class Domain extends Model
{
    protected $fillable = [
        'domain_name',
    ];

    public function topics(){
    	return $this->hasMany(Topic::class);
    }
}
