<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    return view('student.dashboard');
  }

  public function show(){
    return view('student.profile');
  }

  public function profileUpdate(Request $request){
    //validation rules

    $request->validate([
        'name' =>'required|min:4|string|max:255',
        'email'=>'required|email|string|max:255'
    ]);
    $user =Auth::user();
    $user->name = $request['name'];
    $user->email = $request['email'];
    $user->save();
    return back()->with('message','Profile Updated');
}
}