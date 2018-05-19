<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Auth;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $courses= Course::all();
        $user=Auth::user();
        if($user['role']=='mentor'){
            return view('courses.index')->withCourses($courses);
        }
        else{
            return redirect()->route('users.show',$user->id);
        }
         //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,array(
           'ime' => 'required',
           'kod' => 'required',
           'program' => 'required',
           'bodovi'=>'required',
           'sem_redovni' => 'required',
           'sem_izvanredni'=>'required'
        ));//

        $course= new Course;

        $course->ime = $request->ime;
        $course->kod = $request->kod;
        $course->program = $request->program;
        $course->bodovi = $request->bodovi;
        $course->sem_redovni = $request->sem_redovni;
        $course->sem_izvanredni = $request->sem_izvanredni;
        $course->izborni=$request->izborni;

        $course->save();


        return redirect()->route('courses.show',$course->id);  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       $course=Course::find($id);
        $user=Auth::user();
        if($user['role']=='mentor'){

            return view('courses.show')->withCourse($course);
        }
        else{
            return redirect()->route('users.show',$user->id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::find($id);
        return view('courses.edit')->withCourse($course);////
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
       $this->validate($request,array(
           'ime' => 'required',
           'kod' => 'required',
           'program' => 'required',
           'bodovi'=>'required',
           'sem_redovni' => 'required',
           'sem_izvanredni'=>'required'


       ));
       $course=Course::find($id);

       $course->ime=$request->input('ime');
        $course->kod=$request->input('kod');
        $course->program=$request->input('program');
        $course->bodovi=$request->input('bodovi');
        $course->sem_redovni=$request->input('sem_redovni');
        $course->sem_izvanredni=$request->input('sem_izvanredni');
        $course->izborni=$request->input('izborni');

        $course->save();

        return redirect()->route('courses.show',$course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $course=Course::find($id);
       $course->users()->detach();
       $course->delete();

       return redirect()->route('courses.index');
        //
    }
}
