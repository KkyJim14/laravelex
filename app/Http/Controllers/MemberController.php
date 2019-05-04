<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Hash;

class MemberController extends Controller
{
    public function RegisterProcess(Request $request) {

      // Validate ข้อมูล
      $validatedData = $request->validate([
        'fname' => 'required|max:100',
        'lname' => 'required|max:100',
        'email' => 'required|email|max:200|unique:member,user_email',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
        'birthdate' => 'required|date',
        'gender' => 'required|numeric',
      ]);

      // Create
      $member = new Member;
      $member->user_fname = $request->fname;
      $member->user_lname = $request->lname;
      $member->user_email = $request->email;
      $member->user_password = Hash::make($request->password);
      $member->user_birthdate = $request->birthdate;
      $member->user_gender = $request->gender;
      $member->save();

      //กำหนด Session
      $this_member = Member::where('user_email',$request->email)->first();
      session([
              'user_id' => $this_member->user_id,
              'user_fname' => $this_member->user_fname,
              'user_lname' => $this_member->user_lname,
              'user_email' => $this_member->user_email,
              'user_log' => 1,
              ]);

      // Redirect ไปที่ path root
      return redirect('/');
    }



    public function LoginProcess(Request $request)  {

      // Validate ข้อมูล
      $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
      ]);

      //ถ้ามีอีเมลนี้
      if (Member::where('user_email',$request->email)->count() == 1) {
        //หาอีเมลที่ตรงกับ Request
        $member = Member::where('user_email',$request->email)->first();
        //เชคว่าตรงกับใน DB ที่ Hash ไว้ไหม
        if (Hash::check($request->password,$member->user_password)) {
          //กำหนด Session
          session([
                  'user_id' => $member->user_id,
                  'user_fname' => $member->user_fname,
                  'user_lname' => $member->user_lname,
                  'user_email' => $member->user_email,
                  'user_log' => 1,
                  ]);

          return redirect('/');
        }
        else {
          // Redirect กลับไปหน้าก่อนหน้านี้
          return redirect()->back()->with('fail','Wrong Email or Password');
        }
      }
      else {
        // Redirect กลับไปหน้าก่อนหน้านี้
        return redirect()->back()->with('fail','Wrong Email or Password');
      }

    }

    public function LogoutProcess(Request $request) {

      //ทำลาย session ทั้งหมด
      $request->session()->flush();
      $request->session()->regenerate();


      // Redirect ไป path root
      return redirect('/');
    }
}
