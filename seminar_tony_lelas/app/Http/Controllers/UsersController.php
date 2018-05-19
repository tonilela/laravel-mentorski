<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $users= User::all();
        $user=Auth::user();

        if($user['role']=='mentor'){
        return view('users.index')->withUsers($users);
    }
    else{
        return redirect()->route('users.show',$user->id);
    }}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('users.create');
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
        $this->validate($request,array(
            'name' => 'required|max:128',
            'last_name' => 'required|max:128',
            'email' => 'required|unique:users|E-Mail',
            'password' => 'required'
        ));//

        $user = new User;

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();


        return redirect()->route('users.show',$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $neki=Auth::user();
        if($neki['id']==$id || $neki['role']=='mentor'){
        $user=User::find($id);
        $upisani=[];
        foreach ($user->courses as $coursess)
            array_push($upisani,$coursess['id']);


        $all_courses=\App\Course::all();
        $svi=[];
        foreach ($all_courses as $ac)
            array_push($svi,$ac['id']);



        $neupisani=array_diff($svi,$upisani);
        $svi_predmeti=[];
        $nisu_upisani=[];
        $upisani_predmeti=[];
        foreach ($all_courses as $ac){
            foreach ($neupisani as $ne){
                if($ac['id']==$ne){
                array_push($nisu_upisani,$ac);

                }}
            foreach ($upisani as $u){
                if($ac['id']==$u){
                    array_push($upisani_predmeti,$ac);
                }}


        }
        return view('users.show',['nisu_upisani'=>$nisu_upisani,'upisani_predmeti'=>$upisani_predmeti,'svi'=>$all_courses])->withUser($user);
    }
    else{
        return redirect()->route('users.show',$neki->id);

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

        $user=User::find($id);
        return view('users.edit')->withUser($user);//
    }

    /**
     * Update the specified resource in storage.
     * bcrypt($data['password'])
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            'name' => 'required|max:128',
            'last_name' => 'required|max:128',
            'email' => 'required|E-Mail',
            'password' => 'required',
            'role'=>'required',
            'status'=>'required'
        ));//

        $user=User::find($id);        //

        $user->last_name=$request->input('last_name');
        $user->name=$request->input('name');
        $user->email=$request->input('email');

        if($request->input('password')==$user->password)
        {
            $user->password=$request->input('password');
           }
        else
            {
            $user->password=bcrypt($request->input('password'));
            }
        $user->role=$request->input('role');
        $user->status=$request->input('status');

        $user->save();


        return redirect()->route('users.show',$user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $user=User::find($id);
     $user->courses()->detach();
     $user->delete();

     //Session::flash('success','Korisnik je izbrisan ');
     return redirect()->route('users.index');//
    }
}
