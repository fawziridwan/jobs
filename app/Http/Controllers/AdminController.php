<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Sentinel;
use App\User, App\UserDetail;
use App\Http\Requests\ProfileRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicant = User::with('userdetail')->get();
        $hitung = UserDetail::where('status','unread')->count('id');
        //dd($applicant);
        return view('admin.dashboard', compact('applicant','hitung'));
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
        $user = User::find($id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name
        ]);
        $userdetail = UserDetail::where('user_id',$id)->update([
            'placeof_birth'=>$request->placeof_birth,
            'gender'=>$request->gender,
            'phone_number'=>$request->phone_number
        ]);
        if ($user && $userdetail) {
            Alert::success('Update Successfuly ');
            return redirect()->route('administrator.index');
        } else {
            Alert::error('Error', 'Login Fails');
            return view('administrator.index');
        }
        
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
    // choose status application cv
    public function choose_status(Request $request, $id)
    {
        try {
            $update = UserDetail::find($id)->Update([
                'status' => $request->status
            ]);
            Alert::success('Successfuly Change');
            return redirect()->route('administrator.index');

        } catch (\Exception $e) {
            Alert::error('Failed to Change');
            return redirect()->route('administrator.index');
        }
    }
    // downloads your application cv
    public function download()
    {
        $file_path = public_path('data/'.$file);
        return response()->download($file_path);
    }
    // show user by where query
    public function tampil_user($id)
    {
        $use_data = User::with(array('userdetail'=>function($kueri) use ($id)
        {
            $kueri->where('user_details.user_id',$id);
        }))->get();
        return view('administrator.profile')->with('userdata',$user_data);       
    }

    public function get_status(Request $request)
    {
        $status= $request->status;
        $applicant = User::with(array('userdetail'=>function($kueri) use ($status){
            $kueri->where('user_details.status', $status);
            $kueri->orderBy('user_details.created_at','DESC');
        }))->get();

        return view('temp.table_ajax')->with('applicants',$applicant);
    }
}
