<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as InterventionImage;


class VehicleController extends Controller
{
    public function myProduct() {
        $userId = Auth::id();
        $vehicles = Vehicle::where('user_id', $userId)->get();
        return view('page.product.myProduct', compact('vehicles'));
    }

    public function addProduct(){
        return view ('page.product.addProduct');
    }

    public function addProductLogic(Request $request)
    {
        // Validate the request data
        $request->validate([
            'vehicle_type' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_name' => 'required',
            'vehicle_category' => 'required',
            'vehicle_location' => 'required',
            'vehicle_transmition' => 'required',
            'vehicle_seat_capacity' => 'required',
            'vehicle_engine_capacity' => 'required',
            'vehicle_fuel_type' => 'required',
            'vehicle_fuel_tank_capacity' => 'required',
            'vehicle_fuel_consumption' => 'required',
            'vehicle_milage' => 'required',
            'vehicle_year_production' => 'required|numeric|max:' . date('Y'),
            'vehicle_tax' => 'required',
            'vehicle_service_fee' => 'required',
            'price' => 'required',
            'vehicle_status' => 'required',
            'vehicle_cover_image' => 'required|image',
            'images' => 'required',
            'images.*' => 'image'
        ]);

        // Check the aspect ratio of vehicle_cover_image
        $coverImage = $request->file('vehicle_cover_image');
        $coverImageDimensions = getimagesize($coverImage);
        $coverImageWidth = $coverImageDimensions[0];
        $coverImageHeight = $coverImageDimensions[1];

        if ($coverImageWidth !== $coverImageHeight) {
            return back()->withErrors(['vehicle_cover_image' => 'The cover image must be in a 1:1 ratio.'])->withInput();
        }

        // Check the aspect ratio of each image in images[]
        foreach ($request->file('images') as $image) {
            $imageDimensions = getimagesize($image);
            $imageWidth = $imageDimensions[0];
            $imageHeight = $imageDimensions[1];

            if ($imageWidth !== $imageHeight) {
                return back()->withErrors(['images' => 'All images must be in a 1:1 ratio.'])->withInput();
            }
        }

        // Get the authenticated user's ID
        $user_id = Auth::id();

        $imageCoverName = $request['vehicle_name'] . '-cover-image-' . time() . rand(1, 1000) . '.' . $coverImage->extension();
        $coverImage->move(public_path('storage/vehicle_images'), $imageCoverName);

        // Create new vehicle
        $new_vehicle = Vehicle::create([
            'user_id' => $user_id,
            'vehicle_type' => $request['vehicle_type'],
            'vehicle_brand' => $request['vehicle_brand'],
            'vehicle_name' => $request['vehicle_name'],
            'vehicle_location' => $request['vehicle_location'],
            'vehicle_category' => $request['vehicle_category'],
            'vehicle_transmition' => $request['vehicle_transmition'],
            'vehicle_seat_capacity' => $request['vehicle_seat_capacity'],
            'vehicle_engine_capacity' => $request['vehicle_engine_capacity'],
            'vehicle_fuel_type' => $request['vehicle_fuel_type'],
            'vehicle_fuel_tank_capacity' => $request['vehicle_fuel_tank_capacity'],
            'vehicle_fuel_consumption' => $request['vehicle_fuel_consumption'],
            'vehicle_milage' => $request['vehicle_milage'],
            'vehicle_year_production' => $request['vehicle_year_production'],
            'vehicle_tax' => $request['vehicle_tax'],
            'vehicle_service_fee' => $request['vehicle_service_fee'],
            'vehicle_status' => $request['vehicle_status'],
            'price' => $request['price'],
            'vehicle_cover_image' => $imageCoverName
        ]);

        foreach ($request->file('images') as $image) {
            // Move the image to the desired directory
            $imageName = $request['vehicle_name'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
            $image->move(public_path('storage/vehicle_images'), $imageName);

            // Create a new Image record for each uploaded image
            Image::create([
                'vehicle_id' => $new_vehicle->id,
                'image' => $imageName
            ]);
        }

        $request->flash('success', 'Success add new product!');

        // Redirect to myProduct route
        return redirect('/myProduct');
    }

    public function editProduct($id){
        $vehicle = Vehicle::find($id);
        return view ('page.product.editProduct', ['vehicle' => $vehicle]);
    }

    public function editProductLogic(Request $request, $id) {
        $request->validate([
            'vehicle_type' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_name' => 'required',
            'vehicle_category' => 'required',
            'vehicle_location' => 'required',
            'vehicle_transmition' => 'required',
            'vehicle_seat_capacity' => 'required',
            'vehicle_engine_capacity' => 'required',
            'vehicle_fuel_type' => 'required',
            'vehicle_fuel_tank_capacity' => 'required',
            'vehicle_fuel_consumption' => 'required',
            'vehicle_milage' => 'required',
            'vehicle_year_production' => 'required|numeric|max:' . date('Y'),
            'vehicle_tax' => 'required',
            'vehicle_service_fee' => 'required',
            'price' => 'required',
            'vehicle_status' => 'required',
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_brand = $request->vehicle_brand;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_category = $request->vehicle_category;
        $vehicle->vehicle_location = $request->vehicle_location;
        $vehicle->vehicle_transmition = $request->vehicle_transmition;
        $vehicle->vehicle_seat_capacity = $request->vehicle_seat_capacity;
        $vehicle->vehicle_engine_capacity = $request->vehicle_engine_capacity;
        $vehicle->vehicle_fuel_type = $request->vehicle_fuel_type;
        $vehicle->vehicle_fuel_tank_capacity = $request->vehicle_fuel_tank_capacity;
        $vehicle->vehicle_fuel_consumption = $request->vehicle_fuel_consumption;
        $vehicle->vehicle_milage = $request->vehicle_milage;
        $vehicle->vehicle_year_production = $request->vehicle_year_production;
        $vehicle->vehicle_tax = $request->vehicle_tax;
        $vehicle->vehicle_service_fee = $request->vehicle_service_fee;
        $vehicle->price = $request->price;
        $vehicle->vehicle_status = $request->vehicle_status;
        $vehicle->save();
        return redirect('/myProduct');
    }

    public function previewProduct($id){
        $vehicles = Vehicle::find($id);
        $images = $vehicles->images;

        return view('page.product.previewProduct', compact('vehicles', 'images'));
    }
}
