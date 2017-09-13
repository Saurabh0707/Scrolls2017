<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Member;
use App\Team;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
class AuthController extends ApiController
{
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
       $rules = [
            'team_name' => 'required|max:50',
            'domain_id' => 'required',
            'topic_id' => 'required',
            'password' => 'required|min:6',
            'noofmembers' => 'required',

            
            'members.*.name' => 'required',
            'members.*.course' => 'required',
            'members.*.year' => 'required|max:1',
            'members.*.student_no' => 'nullable|regex:/^(\d){7}[dD\-"\s"]{0,1}$/|unique:members',
            'members.*.accomodation' => 'required',
            'members.*.college_name' => 'required|alpha',
            'members.*.email' => 'required|email|unique:members',
            'members.*.contact_no' => 'required',
            
        ];

        $this->validate($request, $rules);
        
        $inputs = $request->all();
        $team_name = $request->team_name;
        $domain_id = $inputs['domain_id'];
        $topic_id = $inputs['topic_id'];
        $team_id = 'SCROLLS'.$domain_id.$topic_id.rand(10,99).rand(1,9);

        $team = Team::create([
        	'team_name' => $team_name,
        	'password' => Hash::make($request->password),
        	'teamid' => $team_id,
        	'domain_id' => $domain_id,
        	'topic_id'=> $topic_id,
        	'noofmembers' => $request->noofmembers,
        ]);

        foreach($inputs['members'] as $member){
            $mem = [
                'name'=>$member['name'],
                'email'=>$member['email'],
                'course'=>$member['course'],
                'year'=>$member['year'],
                'student_no'=>$member['student_no'],
                'accomodation'=>$member['accomodation'],
                'college_name'=>$member['college_name'],
                'contact_no'=>$member['contact_no'],
                'team_id'=>$team->id,
                'teamlead' => $member['teamlead'],
            ];
            
            //DB::table('members')->insert(['team_id'=>$team->id);
            Member::create($mem);
        }
        
        $members = Member::where('team_id', $team->id)->where('teamlead', 1)->first();
        $email = $members->email;
        $subject = "Team Registration for SCROLLS 2k17";

        if(Mail::send('email.template', ['name' => $team_name, 'team_id' => $team_id],
            function($mail) use ($email, $team_name, $subject){
                $mail->from("akgec-scrolls@silive.in", "SCROLLS 2k17");
                $mail->to($email, $team_name);
                $mail->subject($subject);
            })){
   
        return response()->json(['success'=> true, 'data'=> $team_id]);
       }
       else{

       	return response()->json(['success'=> true, 'data'=> $team_id]);
       }
    }


    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'teamid' => 'required',
            'password' => 'required',
        ];
        $input = $request->only('teamid', 'password');
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json(['success'=> false, 'error'=> $error]);
        }
        $credentials = [
            'teamid' => $request->teamid,
            'password' => $request->password,
            
        ];
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'Invalid Credentials. Please make sure you entered the right information.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }


    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }



	 /**
     * API Recover Password
     *	
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
        try {
            Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject('Your Password Reset Link');
            });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['success' => false, 'error' => $error_message], 401);
        }
        return response()->json([
            'success' => true, 'data'=> ['msg'=> 'A reset email has been sent! Please check your email.']
        ]);
    }

}