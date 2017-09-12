<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domain;

class Topic extends Model
{
    protected $fillable = [
        'topic_name',
    ];

    public function domains(){
    	return $this->hasOne(Domain::class, 'id', 'domain_id');
    }
}
