<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\car;
use App\Models\review;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Events\sendregistermail;
use Illuminate\Support\Facades\Event;

class IController extends Controller
{
    // function for displaying register page
    public function register()
    {
        return view('register');
    }

    // function for displaying Login page
    public function login()
    {
        return view('login');
    }

    // function for submit register details in database
    public function register_submit(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'fullname' => 'required|min:5',
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'password' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $add = new User;
        if ($request->isMethod('post')) {
            $add->email = $request->get('email');
            $add->fullname = $request->get('fullname');
            $add->username = $request->get('username');
            $add->password = $request->get('password');
            $add->save();
        }
        if (!is_null($add)) {
            Event::dispatch(new sendregistermail($add)); //Event dispatch here
            return redirect("login");
        }
    }

    // function for Login account
    public function login_account(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $username = $request->get('email');
        $password = $request->get('password');
        $match = User::select('*')->where('email', $username)->where('password', $password)
            ->first();
        if ($match) {
            $request->Session()->put('user', $match->id);
            $request->Session()->put('uname', $match->fullname);
            // echo session('user');
            return redirect("alldisplay");
        }
    }

    // function for display index page
    public function alldisplay()
    {
        $cars = car::all();
        return view('alldisplay', compact('cars'));
    }

    // function for logout account
    public function account_logout()
    {
        Session()->flush('user');
        return redirect('login');
    }

    // email verification
    public function verifyemail(Request $request, $id)
    {
        $verify = User::where('id', $id);
        $verify->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return redirect('http://localhost/projects/cardetails/public/login');
    }

    // display add car page
    public function addcar()
    {
        return view('addcar');
    }

    // submit car details in database
    public function add_submit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'carname' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'average' => 'required',
            'transmission' => 'required',
            'engine' => 'required',
            'seating' => 'required',
            'fueltype' => 'required',
            'color' => 'required',
            'capacity' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $add = new car;
        if ($request->isMethod('post')) {
            $add->carname = $request->get('carname');
            $add->brand = $request->get('brand');
            $add->price = $request->get('price');
            $add->average = $request->get('average');
            $add->transmission = $request->get('transmission');
            $add->engine = $request->get('engine');
            $add->seatingcapacity = $request->get('seating');
            $add->fueltype = $request->get('fueltype');
            $add->color = $request->get('color');
            $add->fuelcapacity = $request->get('capacity');
            $add->releasedate = $request->get('date');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/', $filename);
                $add->image = $filename;
            }
            $add->save();
        }
        return redirect("alldisplay");
    }

    // show all the details of clicked image
    public function carfulldetails($id)
    {
        $data = car::where('id', $id)->get();
        $reviews = review::where('cars_id', $id)->with('cars')->with('users')->get();
        return view('fulldisplay', compact('data', 'reviews'));
    }

    // post Review function
    public function review_submit(Request $request)
    {
        $reviewadd = new review;
        if ($request->isMethod('post')) {
            $reviewadd->review = $request->get('review');
            $reviewadd->users_id = $request->get('userid');
            $reviewadd->cars_id = $request->get('carid');
            $reviewadd->save();
        }
        return back();
    }

    // search car
    public function search_submit(Request $request)
    {
        if ($request->isMethod('post')) {
            $search = $request->get('search');
            $cars = car::where('carname', 'LIKE', '%' . $search . '%')->paginate();
        }
        return view('alldisplay', compact('cars'));
    }

    //    function for lounched cars in this month
    public function justlounched_cars()
    {
        $cars = car::whereMonth('releasedate', date('m'))->get();
        return view('alldisplay', compact('cars'));
    }

    // Function for cars to be launched in next months
    public function upcoming_cars()
    {
        $cars = car::whereMonth('releasedate', '>', date('m'))->get();
        return view('alldisplay', compact('cars'));
    }
}
