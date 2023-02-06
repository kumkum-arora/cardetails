<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\review;

class DisplayController extends Controller
{   
    // display register page
    public function registration()
    {
        return view('register');
    }
    
    // display login page
    public function login_Page()
    {
        return view('login');
    }
   
    // display index page
    public function index()
    {
        $cars = car::all();
        return view('index', compact('cars'));
    }
   //   Display add car form
    public function addCar()
    {
        return view('addcar');
    }

   //  Displaying Data of the selected Car in next page with reviews and all specifications
    public function car_All_details($id)
    {
        $data = car::where('id', $id)->get();
        $reviews = review::where('cars_id', $id)->with('cars')->with('users')->get();
        return view('fulldisplay', compact('data', 'reviews'));
    }
   
    // displaying searched car 
    public function search_Cars(Request $request)
    {
        if ($request->isMethod('post')) {
            $search = $request->get('search');
            $cars = car::where('carname', 'LIKE', '%' . $search . '%')->paginate();
        }
        return view('index', compact('cars'));
    }
   
    //  for displaying cars which is justlounched
    public function justLounched_cars()
    {
        $cars = car::whereMonth('releasedate', date('m'))->get();
        return view('index', compact('cars'));
    }

    // Function for cars to be launched in next months
    public function upcoming_Cars()
    {
        $cars = car::whereMonth('releasedate', '>', date('m'))->get();
        return view('index', compact('cars'));
    }
}
