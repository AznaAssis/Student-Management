<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class login extends Model
{
    use HasFactory;
    public function lreg($table,$data)
    {
        DB::table($table)->insert($data);
    }
    public function log($table,$uname,$password)
    {
        return DB::table($table)->where('uname',$uname)->where('password',$password)->first();
    }
}
