<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class result extends Model
{
    use HasFactory;
    public function resupload($table,$data)
    {
        return DB::table($table)->insert($data);
    }
    public function getres($table)
    {
        return DB::table($table)->get();
    }
    public function approve($table,$data,$id)
    {
        return DB::table($table)->where('id',$id)->update($data);
    }
    public function getresult($table,$id)
    {
        return DB::table($table)->where('name',$id)->get();
    }
    public function gettresult($table,$id)
    {
        return DB::table($table)->where('tid',$id)->get();
    }
}
