<?php

namespace App\Http\Controllers;
use App\Models\School_class;
use App\Models\Student;
use Illuminate\Http\Request;

class Test extends Controller
{
   public function profileinfo()
   {
      //  $users = School_class::with('student')->get();
       $users = Student::all();

      // $users = Student::with('schoolClass')->get();
       

   

       return view('Test.practice', compact('users'));
   }
}
