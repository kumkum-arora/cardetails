<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'carname' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'average' => ['required'],
            'transmission' => ['required'],
            'engine' => ['required'],
            'seating' => ['required'],
            'fueltype' => ['required'],
            'color' => ['required'],
            'capacity' => ['required'],
            'image' => ['required'],
            'date' => ['required'],
        ];
    }
}
