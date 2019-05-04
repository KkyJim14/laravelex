<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // ติดต่อฐานข้อมูล
    protected $table = 'product';

    //เซต Primary Key กรณีไม่ได้ตั้งชื่อว่า id
    protected $primaryKey = 'product_id';
}
