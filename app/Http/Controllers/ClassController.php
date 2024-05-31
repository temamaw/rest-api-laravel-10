<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
use App\Models\Sclass;
 

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

     public function index()
     {
        $classes = Sclass::all();
        return response()->json([
            'status' => 'success',
            'classes' => $classes,
        ]);
     }
 
 

      public function store(Request $request)
      {
          $request->validate([
              'class_name' => 'required|unique:classes|max:25',
          ]);
  
          $class = Sclass::create([
              'class_name' => $request->class_name, 
          ]);
  
          return response()->json([
              'status' => 'success',
              'message' => 'Class created successfully',
              'class' => $class,
          ]);
      }
 
 
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
 
     public function show($id)
     {
         //$class = S_class::find($id);
         $class = DB::table('classes')->where('id',$id)->first();
         return response()->json($class);
     }
 
     // /**
     //  * Show the form for editing the specified resource.
     //  *
     //  * @param  int  $id
     //  * @return \Illuminate\Http\Response
     //  */
     // public function edit($id)
     // {
     //     //
     // }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
 
     public function update(Request $request, $id)
     {
         // $class = S_class::find($id);
         // $class->class_name = $request->class_name;
         // $class->update();
 
         $data= array();
         $data['class_name'] = $request->class_name;
         DB::table('classes')->where('id',$id)->update($data);
 
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
          DB::table('classes')->where('id',$id)->delete();
         // $class = S_class::find($id);
         // $class->delete();
 
         return response('Class Deleted');
     }
}
