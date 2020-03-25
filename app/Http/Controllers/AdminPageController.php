<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;

use App\schedules;

use App\studentRegist;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry You can't access this page");
        }
        
        return view('adminPage.index',compact('listSched'));
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
        //
        $confirm = studentRegist::find($id);
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry You can't access this page");
        }
        
        return view('adminPage.edit',compact('confirm'));


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
}
