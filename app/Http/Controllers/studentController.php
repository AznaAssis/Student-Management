<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\sreg;
use App\models\treg;
use App\models\feedback;
use App\models\tt;
use App\models\sylb;
use App\models\note;
use App\models\result;
class studentController extends Controller
{
    public function __construct()
    {
        $this->obj=new sreg;
        $this->obj1=new treg;
        $this->obj6=new feedback;
        $this->obj2=new sylb;
        $this->obj4=new note;
        $this->obj3=new tt;;
        $this->obj5=new result;
    }
    public function register()
    {
        return view('student.register');
    }
    public function login()
    {
        return view('student.login');
    }
    public function home()
    {
        return view('student.studenthome');
    }
    public function syllabus()
    {
        $id=session('sess');
        $data['res']= sylb::join('sregs', 'sregs.class', '=', 'sylbs.class')
        ->where('sregs.id',$id)
        ->get(['sylbs.subject','sylbs.syllabus','sylbs.status']);
        return view('student.viewsyllabus',$data);
    }
    public function tt()
    {
        $id=session('sess');
        $data['res']= tt::join('sregs', 'sregs.class', '=', 'tts.class')
        ->where('sregs.id',$id)
        ->get(['tts.id','tts.tt','tts.status']);
        return view('student.viewtt',$data);
    }
    public function notes()
    {
        $id=session('sess');
        $data['res']= note::join('sregs', 'sregs.class', '=', 'notes.class')
        ->where('sregs.id',$id)
        ->get(['notes.subject','notes.note']);
        return view('student.viewnotes',$data);
    }
    public function result()
    {
        $id=session('sess');
        $data['res']= $this->obj5->getresult('results',$id);
        // print_r($data);
        // exit();
        return view('student.sreslt',$data);
    }
    public function feedback()
    {
        $data['res']=$this->obj1->getteach('tregs');
        return view('student.sfeedback',$data);
    }
    public function regaction(request $req)
    {
        $title=$req->input('title');
        $name=$req->input('name');
        $dob=$req->input('dob');
        $email=$req->input('email');
        $fname=$req->input('fname');
        $mname=$req->input('mname');
        $place=$req->input('place');
        $address=$req->input('Address');
        $pincode=$req->input('pincode');
        $class=$req->input('class');
        $div=$req->input('div');
        $uname=$req->input('uname');
        $password=$req->input('password');
        $data=['title'=>$title,
        'name'=>$name,
        'dob'=>$dob,
        'email'=>$email,
        'fname'=>$fname,
        'mname'=>$mname,
        'address'=>$address,
        'place'=>$place,
        'pincode'=>$pincode,
        'class'=>$class,
        'div'=>$div,
        'uname'=>$uname,
        'password'=>$password,
        'usertype'=>'student'
    ];
        $this->obj->reg('sregs',$data);
    return redirect('/login');
}
public function logaction(request $req)
    {
        $uname=$req->input('uname');
        $password=$req->input('password');
        $data=$this->obj->log('sregs',$uname,$password);
        if(isset($data)){
                $req->session()->put(array('sess'=>$data->id));
                return redirect('/studenthome');
        }
        else{
            return redirect('/login')->with('error','invalid Email id or Password');
        }
    }
    public function fbaction(request $req)
    {
        $feedback=$req->input('feedback');
        $name=$req->input('teacher');
        $data=['feedback'=>$feedback,
        'tname'=>$name,];
        $this->obj6->insfb('feedback',$data);
    return redirect('/sfeedback');
    }
}
