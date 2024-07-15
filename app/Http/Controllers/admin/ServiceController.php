<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $record = Service::all();
        return view('admin.pages.services.index', compact('record'));
    }

    public function create(Request $request, $record = null)
    {
        if ($record == "") {
            $record = new Service;
        } else {
            $record = Service::find($record);
        }
    
        if ($request->isMethod('post')) {
            $record->title = $request['title'];
            $record->description = $request['description'];
            $record->time = $request['time'];
            $record->price = $request['price'];
            $record->category = $request['category'];
            // Handle the main image upload
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = public_path('uploads/service-images');
                $request->file('image')->move($imagePath, $imageName);
                $record->image = $imageName;
            }
    
            $record->save(); // Save the record, including the image filename
    
            return redirect()->route('view.services')->with('success', 'Service save Successfully ');
        } else {
            return view('admin.pages.services.create-service', compact('record'));
        }
    }

    public function destroy($id)
    {
        $record = Service::find($id);
        // Check if the car exists
        if ($record) {
            // Delete the car from the database
            $record->delete();

            // Optionally, you can add a success message to display to the user
            return redirect()->route('view.services')->with('success', 'Detail deleted successfully!');
        } else {
            // Optionally, you can add an error message to display to the user
            return redirect()->route('view.services')->with('error', 'Detail not found!');
        }
    }
}
