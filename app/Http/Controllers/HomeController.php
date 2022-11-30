<?php
  
namespace App\Http\Controllers;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function index()
    {
        return view('welcome');
    } 

  //Show specific dashboard 
    public function coachHome()
    {
        return view('coachhome');
    }
  
//Show generic dashboard
    public function runnerHome()
    {
        return view('home');
    }
}