<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class feedback extends Model
{
    use HasFactory;
    public function insfb($table,$data)
    {
        DB::table($table)->insert($data);
    }
    public function getfb($table,$id)
    {
        return DB::table($table)->where('tname',$id)->get();
    }
    public function getafb($table)
    {
        return DB::table($table)->get();
    }
}
