<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class treg extends Model
{
    use HasFactory;
    public function reg($table,$data)
    {
        DB::table($table)->insert($data);
    }
    public function log($table,$uname,$password)
    {
        return DB::table($table)->where('uname',$uname)->where('password',$password)->first();
    }
    public function getteach($table)
    {
        return DB::table($table)->get();
    }
    public function approve($table,$data,$id)
    {
        return DB::table($table)->where('id',$id)->update($data);
    }
    
}
