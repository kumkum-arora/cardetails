<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\car;
use App\Models\review;
use App\Http\Requests\CarFormRequest;
use App\Http\Requests\ReviewRequest;

class PostController extends Controller
{  
    // For add cardetails into the database and store image in storage
    public function addCar_submit(CarFormRequest $request)
    {     
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/', $filename);
        }
        car::create([
            'carname' => $request->carname,
            'brand' => $request->brand,
            'price' => $request->price,
            'average' => $request->average,
            'transmission' => $request->transmission,
            'engine' => $request->engine,
            'seatingcapacity' => $request->seating,
            'fueltype' =>$request->fueltype,
            'color' => $request->color,
            'fuelcapacity' => $request->capacity,
            'releasedate' => $request->date, 
            'image' => $filename,
        ]);
        return redirect("index");
    }
    
    // for submit review on the car and adding same to the database
    public function review_Submit(ReviewRequest $request)
    {
        review::create([
            'review' => $request->review,
            'users_id' => $request->userid,
            'cars_id' => $request->carid,
        ]);
        return back();
    }
}
