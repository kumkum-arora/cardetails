<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\car;
use App\Models\review;

class PostController extends Controller
{
    public function addCar_submit(Request $request)
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
        return redirect("index");
    }

    public function review_Submit(Request $request)
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
}
