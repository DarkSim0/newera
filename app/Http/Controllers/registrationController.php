<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use Session;

use DB;

use App\studentRegist;

use App\Towns;

use App\UserLevel;

use App\Programs;

use Auth;

use App\schedules;

use PDF;

use Carbon\Carbon;

use Calendar;

use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

use App\Uploads;

use App\Slots;


class registrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dash()
    {  
        $file = Uploads::all();
        $checker = studentRegist::all();
        $data = schedules::where('status','like','%pending%')->get();
        return view ('studentPage.dashboard',compact('checker','data','file'));
    }

    public function index()
    {   
        
        // foreach($regExist as $re)
        // {
        //     if($re->Created_by == Auth::user()->id){
        //         echo "this is no work";
        //     }else{
        //         echo "this works";
        //     }
        // }
        $regExist = studentRegist::all();
        foreach($regExist as $re){
            if($re->Created_by == Auth::user()->id){
                return Redirect::back()->withErrors(['You already filled the form']);
            } 
            else 
            {
                $prog = Programs::orderBy('prog_name','asc')->get();
                return view('studentPage.index',compact('prog'));
            }
        }    

    }
       
        //Using Access Rights
        // try{
        //     $level = Auth::user()->user_level;
        // }
        // catch(Exception $e){
        //     dd($e);
        // }
        // $rights = UserLevel::where('id','=',$level)->get();
        // foreach($rights as $r)
        // {
        //     if($r->id == 1 ){
        //         return view('studentPage.index');
        //     }else{
        //         return view('home');
        //     }
        // }

    public function store(Request $req){

            $validation = $req->validate([
                'EntryStatus' => 'required',
                'fname' => 'required',
                'mname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'dob' => 'required|Date',
                'birth_place' => 'required',
                'cs' => 'required',
                'religion' => 'required',
                'Nationality' => 'required',
                'contactnum' =>'required' , 
                'streetadd' => 'required',
                'townprovince' => 'required',
                'emailbasic' => 'required',
                'fatherfname' => 'required',
                'fatherlname' => 'required',
                'fathermname' => 'required',
                'fathernationality' => 'required',
                'fatheroccupation' => 'required',
                'motherfname' => 'required',
                'motherlname' => 'required',
                'mothermname' => 'required',
                'mothernationality' => 'required',
                'motheroccupation' => 'required',
                'contactper' => 'required',
                'guardiancon' => 'required',
                'firstChoice' => 'required',
                'secondChoice' => 'required'
            ]);

            $regstudent = array(
                'EntryStatus' => $req->EntryStatus,
                'Created_by' =>Auth::user()->id,
                'fname' => $req->fname,
                'mname' => $req->mname,
                'lname' => $req->lname,
                'gender' => $req->gender,
                'age' => $req->age,
                'dob' => $req->dob,
                'birth_place' => $req->birth_place,
                'cs' => $req->cs,
                'religion' => $req->religion,
                'Nationality' => $req->Nationality,
                'contactnum' => $req->contactnum, 
                'streetadd' => $req->streetadd,
                'townprovince' => $req->townprovince,
                'emailbasic' => $req->emailbasic,
                'landlinenum' => $req->landlinenum,
                'fatherfname' => $req->fatherfname,
                'fatherlname' => $req->fatherlname,
                'fathermname' => $req->fathermname,
                'fathernationality' => $req->fathernationality,
                'fatheroccupation' => $req->fatheroccupation,
                'motherfname' => $req->motherfname,
                'motherlname' => $req->motherlname,
                'mothermname' => $req->mothermname,
                'mothernationality' => $req->mothernationality,
                'motheroccupation' => $req->motheroccupation,
                'contactper' => $req->contactper,
                'guardiancon' => $req->guardiancon,
                'elementary' => $req->elementary,
                'elemattend' => $req->elemattend,
                'elemgrad' => $req->elemgrad,
                'highschool' => $req->highschool,
                'highattend' => $req->highattend,
                'highgrad' => $req->highgrad,
                'senior' => $req->senior,
                'seniorattend' => $req->seniorattend,
                'seniorgrad' => $req->seniorgrad,
                'college' => $req->college,
                'collegeattend' => $req->collegeattend,
                'collegegrad' => $req->collegegrad,
                'vocational' => $req->vocational,
                'vocattend' => $req->vocattend,
                'vocgrad' => $req->vocgrad,
                'firstChoice' => $req->firstChoice,
                'secondChoice' => $req->secondChoice,
            );
           studentRegist::create($regstudent);

           

        Session::flash('success','Basic info saved');
        return redirect('/');
    }


    public function autoComplete(Request $req)
    {
        if($req->get('query'))
        {
         $query = $req->get('query');
         $data = DB::table('towns')
           ->where('Town', 'LIKE', "%{$query}%")
           ->take(3)
           ->get();
         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
         foreach($data as $row)
         {
          $output .= '
          <li><a href="#">'.$row->Town."  ".$row->Province."  ".$row->Zipcode."  ".$row->Region.'</a></li>
          ';
         }
         $output .= '</ul>';
         echo $output;
        }
    }
    public function printform($id){
       
        $print = studentRegist::find($id);
        $pdf = PDF::loadView('studentPage.print',compact('print'));
        if(Auth::user()->id == $print->Created_by){
            return $pdf->stream('student_request.pdf');
        }elseif(Auth::user()->user_level == 1 || Auth::user()->user_level == 3){
            return $pdf->stream('student_request.pdf');
        }
        else{
            abort(404,"Sorry You can't access this page");
        }

        

    }

    public function schedule(){
        $slot = DB::table('slots')->latest('created_at','desc')->first();
        {
            $events = [];
            $data = schedules::where('status','!=','pending')->get();
            if($data->count())
            {
                foreach ($data as $key => $value) 
                {
                    $events[] = Calendar::event(
                        $value->title." ".$value->status,
                        true,
                        new \DateTime($value->student_sched),
                        new \DateTime($value->student_schedEnd.'+1 day'),
                        null,
                        // Add color
                        [
                            'color' => '#1aad92',
                            'textColor' => '#edeeef',
                            //'url' => 'pass route',
                        ]
                    );
                }
        }
        $calendar = Calendar::addEvents($events);
        return view('studentPage.schedule',compact('calendar','slot'));
        }
    }

    public function scheduleStore(Request $req){
        $date = Carbon::now();
        $validation = $req->validate([
            'student_sched' => 'required'
        ]);

        $schedStudent = array(
            'student_sched' => $req->student_sched,
            'Created_by' =>Auth::user()->id,
            'student_sched' => $req->student_sched,
            'student_schedEnd' => $req->student_schedEnd,
            'title' => Auth::user()->id.$date->year.$date->month.$date->hour.$date->minute,
        );
        schedules::create($schedStudent);

        // $reserve = DB::table('slots')->latest('created_at','desc')->first();
        // $reserve->slots = $req->get('slots');
        // $reserve->reserved = $req->get('reserved');
        // $reserve->student_sched = $req->get('student_sched');
        // Slots::create($reserve);  

        return redirect('/');
        Session::flash('success','You have successfully reserve a slot');

    }

    public function GenId($id){
       
        $print = studentRegist::find($id);
        $pdf = PDF::loadView('studentPage.TempID',compact('print'))->setPaper('a6','portrait');
        if(Auth::user()->id == $print->Created_by){
            return $pdf->stream($print->lname.'_'.$print->fname.'-'.'TempID.pdf');
        }elseif(Auth::user()->user_level == 1 || Auth::user()->user_level == 3){
            return $pdf->stream($print->lname.'_'.$print->fname.'-'.'TempID.pdf');
        }
        else{
            abort(404,"Sorry You can't access this page");
        }

        

    }
}
