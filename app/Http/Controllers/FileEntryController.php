<?php 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Fileentry;
//use Request;
use Auth;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

 
class FileEntryController extends ApiController {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/*public function index()
	{
		$entries = Fileentry::all();
 
		return view('fileentries.index', compact('entries'));
	}*/
 
	public function add(Request $request) {

		$userid = Auth::user()->id;
		$user = Fileentry::where('team_id', $userid)->first();
		if($user){
			return response()->json(['success'=>false, 'data'=> 'Already Uploaded']);
		}
 		$this->validate($request, [
               'uploadfile' => 'required|file|max:2050|mimes:pdf',
            ]);

		$file = $request->file('uploadfile');
		//dd($file);
		
		$domainid = Auth::user()->domain_id;
		$topicid = Auth::user()->topic_id;
		$teamid = Auth::user()->teamid;
		

		$filenameWithExt = $file->getClientOriginalName();
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		$extension = $request->file('uploadfile')->getClientOriginalExtension();
		$fileNameToStore = $domainid.'_'.$topicid.'_'.$userid.'_'.$teamid.'_'.$filename.'.'.$extension;
		$path = $request->file('uploadfile')->storeAs('public/syno', $fileNameToStore);
		$entry = new Fileentry();
		
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $fileNameToStore;
		$entry->domain_id = $domainid;
		$entry->topic_id = $topicid;
		$entry->team_id = $userid;
		 
		$entry->save();
 
		return response()->json(['success'=> true, 'data'=> 'file uploaded successfully']);
		
	}
}
 