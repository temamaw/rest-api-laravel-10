<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use DB;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    } 
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subject = DB::table('subjects')->get();
        $subject = Subject::all();
        return response()->json($subject);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' =>'required',
            'subject_name'=>'required|unique:subjects|max:25',
            'subject_code'=>'required|unique:subjects|max:25'
        ]);

        $subject= Subject::create($request->all());

         //return response()->json($subject);
        return response("Subject Inserted Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject= Subject::find($id);   //findorfail($id)
        return response()->json($subject);
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
        $subject = Subject::findorfail($id);
        $subject->update($request->all());
        return response('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Subject::find($id)->delete();
        Subject::where('id',$id)->delete();
        return response('deleted done');
    }
}
