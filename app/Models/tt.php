<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class tt extends Model
{
    use HasFactory;
    public function ttupload($table,$data)
    {
        return DB::table($table)->insert($data);
    }
    public function gettt($table)
    {
        return DB::table($table)->get();
    }
    public function approve($table,$data,$id)
    {
        return DB::table($table)->where('id',$id)->update($data);
    }
    public function getttt($table,$id)
    {
        return DB::table($table)->where('tid',$id)->get();
    }
}
