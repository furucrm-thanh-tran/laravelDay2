<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $users = DB::select('select * from users');
        return view('home',['users'=>$users]);
    }

    // public function updateInfo(Request $request) {
    //     $address = $request->address;
    //     $zipcode = $request->zipcode;
    //     $username = Auth::user()->username;
    //     DB::update('update users set address = ?, zip_code = ? where username = ?', [$address, $zipcode, $username]);
    //     return redirect('/home');
    // }

    public function updateInfo(Request $request) {
        $username = Auth::user()->username;
        $user = User::where('username', $username) ->update([
            'address' => $request->input('address'),
            'zip_code' => $request->input('zipcode')
        ]);
        return redirect('/home');
    }
}