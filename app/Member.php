<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // ติดต่อฐานข้อมูล
    protected $table = 'member';

    //เซต Primary Key กรณีไม่ได้ตั้งชื่อว่า id
    protected $primaryKey = 'user_id';
}
