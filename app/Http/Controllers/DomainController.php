<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Domain;
use App\Topic;

class DomainController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::all();
        return $this->showAll($domains);
    }

    public function specificTopic($id){
        //$topics = Topic::where('domain_id', $id)->all();
        $domains = Domain::find($id);
        return $this->showAll($domains->topics);
    }
}
