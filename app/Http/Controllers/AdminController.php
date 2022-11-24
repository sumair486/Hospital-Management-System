<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;
use App\Models\Appointment;


class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
            return view('admin.add_doctor');

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function upload(Request $request)
    {
        $doctor=new Doctor();
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $result=$doctor->save();
        if($result){
            return redirect()->back()->with('success','Data has been upload successfully');

        }
        else{
            return redirect()->back()->with('fail','Something went wrong');
        }


    }
    public function showappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=Appointment::all();


                return view('admin.showappointment',compact('data'));

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

    }

public function approved($id)
{
    $data=Appointment::find($id);
    $data->status='approved';
    $data->save();
    return redirect()->back();

}

public function canceled($id)
{
    $data=Appointment::find($id);
    $data->status='Canceled';
    $data->save();
    return redirect()->back();

}
public function alldoctor()
{
    $data=Doctor::all();

    return view('admin.showdoctors',compact('data'));
}

public function deletedoctor($id)
{
    $data=Doctor::find($id);
    if(!is_null($data)){
        $data->delete();
        return redirect()->back()->with('successer','Doctor profile has been delete successfully');
    }
    return redirect()->back()->with('failer','Something went wrong');

}

public function updatedoctor($id)
{
    $data=Doctor::find($id);
    return view('admin.updatedoctor',compact('data'));
}

public function editdoctor($id,Request $request)
{
    $data=Doctor::find($id);

    $data->name=$request->name;
    $data->phone=$request->phone;
    $data->speciality=$request->speciality;
    $data->room=$request->room;
    $image=$request->file;
    if($image)
    {
        $imagename=time(). '.' .$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $data->image=$imagename;
    }

    $result=$data->save();

    if($result){
        return redirect('alldoctor')->with('s','Data has been updated successfully');

    }
    else{
        return redirect()->back()->with('f','Something went wrong');
    }

}

}
