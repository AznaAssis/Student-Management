<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class sylb extends Model
{
    use HasFactory;
    public function sylbs($table,$data)
    {
        DB::table($table)->insert($data);
    }
    public function approve($table,$data,$id)
    {
        return DB::table($table)->where('id',$id)->update($data);
    }
    public function gettsulbs($table)
    {
        return DB::table($table)->where('tid',$id)->get();
    }
    public function sylbsview($table)
    {
        return DB::table($table)->get();
    }
    public function approves($table,$data,$id)
    {
        return DB::table($table)->where('id',$id)->update($data);
    }
}
