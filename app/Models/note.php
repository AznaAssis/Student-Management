<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class note extends Model
{
    use HasFactory;
    public function notes($table,$data)
    {
        return DB::table($table)->insert($data);
    }
    public function getnote($table)
    {
        return DB::table($table)->get();
    }
    public function gettnote($table,$id)
    {
        return DB::table($table)->where('tid',$id)->get();
    }
}
