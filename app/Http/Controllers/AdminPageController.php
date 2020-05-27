<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;

use App\schedules;

use App\studentRegist;

use DB;

use Carbon\Carbon;

use App\Uploads;

use App\User;

use App\Slots;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $listSched = studentRegist::paginate(10);
        if(!Gate::allows('isAdmin') && !Gate::allows('isStaff')){
            abort(404,"Sorry You can't access this page");
        }
        
        
        return view('adminPage.index',compact('listSched'));
    }

    public function resetSlot(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        //
       
=======
      
>>>>>>> 1d36fc8240e1ee377315927b23062a2527f76c80
        $files = Uploads::all();
        $confirm = studentRegist::find($id);
        if(!Gate::allows('isAdmin') && !Gate::allows('isStaff') ){
            abort(404,"Sorry You can't access this page");
        }
        
        return view('adminPage.edit',compact('confirm','files'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'status' => 'required',
        ]);
        $update =  schedules::find($id);
        $update->status = $request->get('status');
        $update->save();
<<<<<<< HEAD

=======
       
>>>>>>> 1d36fc8240e1ee377315927b23062a2527f76c80
        return redirect('/admin')->with('success', 'Student record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //search and filters
    public function autoComplete(Request $req)
    {
        if($req->get('query'))
        {
         $query = $req->get('query');
         $data = DB::table('student_register')
           ->where('lname', 'LIKE', "%{$query}%")
           ->orWhere('fname', 'LIKE', "%{$query}%")
           ->take(3)
           ->get();
         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
         foreach($data as $row)
         {
          $output .= '
          <li><a href="#">'.$row->lname.'</a></li>
          ';
         }
         $output .= '</ul>';
         echo $output;
        }
    }

    public function filter(Request $req){
        $filter = $req->get('filter');
        $listSched = studentRegist::where('lname','like','%'.$filter.'%')
        ->orWhere('fname','like','%'.$filter.'%')
        ->paginate(10);
        return view('adminPage.index',compact('listSched'));
    }

   
}
