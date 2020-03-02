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
        return view ('studentPage.dashboard');
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
            );
            studentRegist::create($regstudent);

        Session::flash('success','Basic info saved');
        return redirect('/student_contact');
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
