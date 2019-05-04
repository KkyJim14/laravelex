<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIViewController extends Controller
{
    public function ShowIndex() {
      return view('index');
    }

    //แสดงหน้า Login
    public function ShowLogin() {

      //เชคว่ามีการลอคอินรึยีง?
      if (session('user_log') == 1) {

        //ถ้ามี Redirect path root
        return redirect('/');
      }
      else {

        //ถ้าไม่มี เปิด view หน้า login
        return view('pages.member.login');
      }
    }

    //แสดงหน้า Register
    public function ShowRegister()  {

      //เชคว่ามีการลอคอินรึยีง?
      if (session('user_log') == 1) {
        //ถ้ามี Redirect path root
        return redirect('/');
      }
      else {
        //ถ้าไม่มี เปิด view หน้า Register
        return view('pages.member.register');
      }
    }
}
