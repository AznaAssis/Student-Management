<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\login;
use App\models\treg;
use App\models\sylb;
use App\models\tt;
use App\models\feedback;
use App\models\result;
use Auth;
class miniController extends Controller
{
   
    public function __construct()
    {
        $this->obj=new login;
        $this->obj1=new treg;
        $this->obj3=new sylb;
        $this->obj4=new tt;
        $this->obj2=new result;
    }
    public function index()
    {
        return view('user.index');
    }
    public function login()
    {
        return view('admin.alogin');
    }
    public function home()
    {
        return view('admin.adminhome');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function about()
    {
        return view('user.about');
    }
    public function syllabus()
    {
        $data['res']=sylb::sylbsview('sylbs');
        return view('admin.asyllabus',$data);
    }
    public function tt()
    {
        $data['res']=tt::gettt('tts');
        return view('admin.att',$data);
    }
    public function teacher()
    {
        $data['res']=treg::getteach('tregs');
        return view('admin.ateacher',$data);
    }
    public function result()
    {
        $data['res']=result::getres('results');
        return view('admin.aresult',$data);
    }
    public function feedback()
    {
        $data['res']=feedback::getafb('feedback');
        return view('admin.afeedback',$data);
    }
    public function logout(Request $req) {
        Auth::logout();
        return view('user.index');
      }
public function logaction(request $req)
    {
        $uname=$req->input('uname');
        $password=$req->input('password');
        $data=$this->obj->log('logins',$uname,$password);
        if(isset($data)){
                $req->session()->put(array('sess'=>$data->regid));
                return redirect('/adminhome');
        }
        else{
            return redirect('/alogin')->with('error','invalid Email id or Password');
        }
    }
    public function appteach($id)
    {
        $data=['status'=>"Approve"];
        $this->obj1->approve('tregs',$data,$id);
          return redirect('/ateacher');
    }  
    public function appsyllub($id)
    {
        $data=['status'=>"Approve"];
        $this->obj3->approves('sylbs',$data,$id);
          return redirect('/asyllabus');
    } 
    public function approvett($id)
    {
        $data=['status'=>"Approve"];
        $this->obj4->approve('tts',$data,$id);
          return redirect('/att');
    }  
    public function appres($id)
    {
        $data=['status'=>"Approve"];
        $this->obj2->approve('results',$data,$id);
          return redirect('/aresult');
    }  
}
