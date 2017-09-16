<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Fileentry extends Model
{
	protected $table='synopsis';
    protected $fillable = [
        'uploadfile', 'domain_id', 'topic_id', 'team_id'
    ];

    public function team(){
    	return $this->belongsTo('Team');
    }
}
