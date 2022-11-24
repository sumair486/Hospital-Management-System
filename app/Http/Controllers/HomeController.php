<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor=Doctor::all();
                $data=compact('doctor');

                return view('user.index')->with($data);
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        }
        else{
        $doctor=Doctor::all();
        $data=compact('doctor');

        return view('user.index')->with($data);
        }

    }

    public function login()
    {
    return view('auth.login');
    }
    public function register()
    {
    return view('auth.register');
    }

    public function appointment(Request $request)
    {
        $data=new Appointment();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->number;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status="In progress";
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $result=$data->save();
        if($result){
            return redirect()->back()->with('suc','Your Appointment has been send');

        }
        else{
            return redirect()->back()->with('fai','Try again');

        }

    }

    public function myappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==0)
            {
                $userid=Auth::user()->id;
                $appoint=Appointment::where('user_id',$userid)->get();//match the id if exist;
                return view('user.my_appointment',compact('appoint'));
            }

        }
        else
        {
            return redirect()->back();
        }
    }
    public function cancel_appointment($id){
        $data=Appointment::find($id);
        if(!is_null($data)){
            $data->delete();
            return redirect()->back()->with('su','Appointment has been delete');
        }
        return redirect()->back()->with('fa','Try Again');
    }


public function About()
{
    $doctor=Doctor::all();
    $data=compact('doctor');

    return view('user.About')->with($data);
}

public function About_doctor()
{
    $doctor=Doctor::all();
    $data=compact('doctor');

    return view('user.doctor')->with($data);
}

public function contact()
{
    return view('user.contact');
}

}
