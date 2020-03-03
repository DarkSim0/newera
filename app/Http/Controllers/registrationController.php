<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use Session;

use DB;

use App\studentRegist;

use App\Towns;

use App\UserLevel;

use Auth;



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
          return view('studentPage.index');
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
            );
            studentRegist::create($regstudent);

        Session::flash('success','Basic info saved');
        return redirect('/');
    }


    public function contactStore(){
        
    }

    public function autoComplete(Request $req)
    {
        if($req->get('query'))
        {
         $query = $req->get('query');
         $data = DB::table('towns')
           ->where('Town', 'LIKE', "%{$query}%")
           ->take(10)
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
}
