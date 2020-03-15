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



class registrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dash()
    {
        $checker = studentRegist::all();
        
        return view ('studentPage.dashboard',compact('checker'));
    }

    public function index()
    {   
        $prog = Programs::orderBy('prog_name','asc')->get();
        return view('studentPage.index',compact('prog'));
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
                'dob' => 'required',
                'birth_place' => 'required',
                'cs' => 'required',
                'religion' => 'required',
                'Nationality' => 'required',
                'contactnum' =>'required' , 
                'streetadd' => 'required',
                'townprovince' => 'required',
                'emailbasic' => 'required',
                'landlinenum' => 'required',
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
        return $pdf->stream('student_request.pdf');

    }

    public function schedule(){
        return view('studentPage.schedule');
    }

    public function scheduleStore(Request $req){
        $validation = $req->validate([
            'student_sched' => 'required'
        ]);

        $schedStudent = array(
            'student_sched' => $req->student_sched,
            'Created_by' =>Auth::user()->id,
            'remarks' => $req->remarks,
        );
        schedules::create($schedStudent);

        Session::flash('success','You have successfully reserve a slot');

    }
}
