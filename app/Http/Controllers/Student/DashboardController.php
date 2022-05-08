<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
          'username' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'telephone' => ['required', 'string', 'max:255'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],

      ]);
      
      $user =Auth::user();
      $user->username = $request['username'];
      $user->email = $request['email'];
      $user->telephone = $request['telephone'];
      $user->password = Hash::make($request['password']);
      $user->save();
      return back()->with('success','Profile Updated');
      // return redirect()->route('profile.settings');
  }
}