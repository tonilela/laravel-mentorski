<?php

namespace App\Http\Controllers;

use App\CourseUser;
use App\User;
use Illuminate\Http\Request;

class CourseUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id,$predmet_id)
    {


        $course_user=new CourseUser();
        $course_user['student_id']=$student_id;
        $course_user['predmet_id']=$predmet_id;
        $course_user['status']='ne';
        $course_user->save();

        return redirect()->route('users.show',$student_id);



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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($student_id,$predmet_id,$stat)
    {
        $user=User::find($student_id);

        $user->courses()->detach($predmet_id);
        $course_user=new CourseUser();
        $course_user['student_id']=$student_id;
        $course_user['predmet_id']=$predmet_id;
        $course_user['status']=$stat;
        $course_user->save();
        return redirect()->route('users.show',$student_id);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id,$predmet_id)
    {
       $user=User::find($student_id);

        $user->courses()->detach($predmet_id);
        return redirect()->route('users.show',$student_id);//

    }
}
