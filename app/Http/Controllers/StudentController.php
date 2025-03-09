<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function insertform(){
        return view('stud_create');
    }


    public function insert(Request $request){
        $name = $request -> input('stud_name');
        DB::insert("insert into students (name) values(?)",[$name]);
        //echo "Record inserted successfully.<br/>";
        //echo '<a href="/insert">click here</a>';
        return redirect('view');
    }

    public function index()
    {
      $users=DB::select ('select * from students ORDER BY id');
      return view('stud_view',['users'=>$users]);
    }
    public function edit($id)
    {
      $users=DB::select ('select * from students where id = ?',[$id]);
      return view('stud_update',['users'=>$users]);
    }
    public function update(Request $request,$id)
    {
      $name = $request -> input('name');
      DB::update('update students set name = ? where id = ?',[$name,$id]);
      echo "Record updated successfully.<br/>";
      echo '<a href="/update-records">click here</a> to go back.';
    }
    public function destroy($id){
        DB::delete('delete from students where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href="/delete-records">click here</a> to go back.';
    }

}
