<?php

namespace App\Http\Controllers\admin;

use App\Models\Cars;
use App\Traits\FileUpload;
use App\Models\CarShowroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{

    public function index()
    {
        
        $record = CarShowroom::all();
        return view('admin.pages.jewelry.index', compact('record'));
    }

    public function create(Request $request, $record = null)
    {
        if ($record == "") {
            $record = new CarShowroom;
        } else {
            $record = CarShowroom::find($record);
        }

        if ($request->isMethod('post')) {
            $record->title = $request['title'];
            $record->content = $request['content'];
            $record->loction = $request['loction'];
            $record->rating = $request['rating'];
            $record->price = $request['price'];
            $record->category = $request['category'];
            $record->status = '0';
            // Handle the main image upload
            if ($request->hasFile('main_image')) {
                $mainimageName = time() . '_' . uniqid() . '.' . $request->file('main_image')->getClientOriginalExtension();
                $mainimagePath = public_path('uploads/main-images/cars');
                $request->file('main_image')->move($mainimagePath, $mainimageName);
                $record->main_image = $mainimageName;
            }
            $record->save(); // Save the record, including the image filename

            return redirect()->route('view.products');
        } else {
            return view('admin.pages.jewelry.create-service', compact('record'));
        }
    }

    public function destroy($id)
    {
        $record = CarShowroom::find($id);
        // Check if the car exists
        if ($record) {
            // Delete the car from the database
            $record->delete();

            // Optionally, you can add a success message to display to the user
            return redirect()->route('view.cars')->with('success', 'Detail deleted successfully!');
        } else {
            // Optionally, you can add an error message to display to the user
            return redirect()->route('view.cars')->with('error', 'Detail not found!');
        }
    }
}
