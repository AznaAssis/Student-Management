<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\treg;
use App\models\login;
use App\models\sylb;
use App\models\note;
use App\models\sreg;
use App\models\tt;
use App\models\feedback;
use App\models\result;
class teacherController extends Controller
{
    public function __construct()
    {
        $this->obj=new treg;
        $this->obj4=new sreg;
        $this->obj1=new sylb;
        $this->obj2=new note;
        $this->obj3=new tt;
        $this->obj6=new feedback;
        $this->obj5=new result;
    }
    public function tregister()
    {
        return view('teacher.tregister');
    }
    public function login()
    {
        return view('teacher.tlogin');
    }
    public function home()
    {
        return view('teacher.teacherhome');
    }
    public function syllabus()
    {
        return view('teacher.syllabus');
    }
    public function tt()
    {
        return view('teacher.uploadtt');
    }
    public function notes()
    {
        return view('teacher.tnotes');
    }
    public function result()
    {
        $data['res']=$this->obj4->getstud('sregs');
        // print_r($data);
        return view('teacher.result',$data);
        // exit();
    }
    public function feedback()
    {
        $id=session('sess');
        $data['res']= feedback::join('tregs', 'tregs.name', '=', 'feedback.tname')
        ->where('tregs.id',$id)
        ->get();
        return view('teacher.feedback',$data);
    }
    public function vsyllabus()
    {
        $id=session('sess');
        $data['res']=sylb::gettsulbs('sylbs',$id);
        return view('teacher.vsyllabus',$data);
    }
    public function vtt()
    {
        $id=session('sess');
        $data['res']=tt::getttt('tts',$id);
        return view('teacher.vtt',$data);
    }
    public function vnotes()
    {
        $id=session('sess');
        $data['res']=note::gettnote('notes',$id);
        return view('teacher.vnotes',$data);
    }
    public function vresult()
    {
        $id=session('sess');
        $data['res']=result::gettres('results',$id);
        return view('teacher.vresult',$data);
    }
    public function tregaction(request $req)
    {
        $title=$req->input('title');
        $name=$req->input('name');
        $email=$req->input('email');
        $phno=$req->input('phno');
        $address=$req->input('Address');
        $uname=$req->input('uname');
        $password=$req->input('password');
        $data=['title'=>$title,
        'name'=>$name,
        'email'=>$email,
        'phno'=>$phno,
        'address'=>$address,
        'uname'=>$uname,
        'password'=>$password,
        'status'=>'0'
    ];
       $res=$this->obj->reg('tregs',$data);
    return redirect('/tlogin');
}
public function logaction(request $req)
    {
        $uname=$req->input('uname');
        $password=$req->input('password');
        // echo $password;
        // exit();
        $data=$this->obj->log('tregs',$uname,$password);
        // print_r($data);
        // echo $data;
        // exit();
        if(isset($data))
        {
            if($data->status=='Approve')
            {
                $req->session()->put(array('sess'=>$data->id));
                return redirect('/teacherhome');
            }
            else
            {
                return redirect('/tlogin');
            }
        }
        else{
            return redirect('/tlogin')->with('error','invalid Email id or Password');
        }
    }
    public function syllaction(request $req)
    {
        $id=session('sess');
        $class=$req->input('class');
        $subject=$req->input('subject');
        $syllabus=$req->input('syllabus');
        $data=['class'=>$class,
        'subject'=>$subject,
        'syllabus'=>$syllabus,
        'tid'=>$id,
        'status'=>'not approve'
    ];
       $res=$this->obj1->sylbs('sylbs',$data);
    return redirect('/vsyllabus');
    }
    public function notesaction(request $req)
    {
        $id=session('sess');
        $class=$req->input('class');
        $subject=$req->input('subject');
        $notes=$req->file('notes');
        // $image=$req->file('image');
        $filename=$notes->getClientOriginalName();
        // echo $filename;
        // exit();
        $notes->move(public_path().'/notes/',$filename);
        $data=['class'=>$class,
        'subject'=>$subject,
        'tid'=>$id,
        'note'=>$filename
    ];
    // print_r($data);
    // exit();
    $this->obj2->notes('notes',$data);
    return redirect('/vnotes');
    }
    public function ttaction(request $req)
    {
        $id=session('sess');
        $class=$req->input('class');
        $timet=$req->file('tt');
        // $image=$req->file('image');
        $filename=$timet->getClientOriginalName();
        // echo $filename;
        // exit();
        $timet->move(public_path().'/notes/',$filename);
        $data=['class'=>$class,
        'tt'=>$filename,
        'tid'=>$id,
        'status'=>'not approve'
    ];
    // print_r($data);
    // exit();
    $this->obj3->ttupload('tts',$data);
    return redirect('/vtt');
    }
    public function resultaction(request $req)
    {
        $id=session('sess');
        $class=$req->input('class');
        $name=$req->input('sname');
        $result=$req->file('result');
        // $image=$req->file('image');
        $filename=$result->getClientOriginalName();
        // echo $filename;
        // exit();
        $result->move(public_path().'/notes/',$filename);
        $data=['class'=>$class,
        'name'=>$name,
        'tid'=>$id,
        'result'=>$filename,
        'status'=>'not approve'
    ];
    // print_r($data);
    // exit();
    $this->obj5->resupload('results',$data);
    return redirect('/vresult');
    }
}