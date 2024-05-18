<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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

    public function addProductLogic(Request $request){
        // Validate the request data
        $request = Validator::make($request->all(), [
            'vehicle_type' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_name' => 'required',
            'vehicle_category' => 'required',
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
            'vehicle_cover_image' => 'required',
            'images'=> 'required'
        ]);

        if ($request->fails()) {
            return redirect()->back()->withErrors($request);
        }

        // Get the authenticated user's ID
        $user_id = Auth::id();

        $imageCoverName = $request['vehicle_name'].'-cover-image-'.time().rand(1, 1000).'.'.$request['vehicle_cover_image']->extension();
        $request['vehicle_cover_image']->move(public_path('storage/vehicle_images'), $imageCoverName);

        // Create new vehicle
        $new_vehicle = Vehicle::create([
            'user_id' => $user_id,
            'vehicle_type' => $request['vehicle_type'],
            'vehicle_brand' => $request['vehicle_brand'],
            'vehicle_name' => $request['vehicle_name'],
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
            $imageName = $request['vehicle_name'].'-image-'.time().rand(1, 1000).'.'.$image->extension();
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

    // public function editProductLogic(Request $request, $id) {
    //     // Validate the request data (excluding cover image if not being updated)
    //     $validator = Validator::make($request->all(), [
    //       'vehicle_type' => 'required',
    //       'vehicle_brand' => 'required',
    //       'vehicle_name' => 'required',
    //       'vehicle_category' => 'required',
    //       'vehicle_transmition' => 'required',
    //       'vehicle_seat_capacity' => 'required',
    //       'vehicle_engine_capacity' => 'required',
    //       'vehicle_fuel_type' => 'required',
    //       'vehicle_fuel_tank_capacity' => 'required',
    //       'vehicle_fuel_consumption' => 'required',
    //       'vehicle_milage' => 'required',
    //       'vehicle_year_production' => 'required|numeric|max:' . date('Y'),
    //       'vehicle_tax' => 'required',
    //       'vehicle_service_fee' => 'required',
    //       'price' => 'required',
    //       'vehicle_status' => 'required',
    //       'images' => 'nullable|array',
    //     ]);

    //     if ($request->fails()) {
    //       return redirect()->back()->withErrors($validator);
    //     }

    //     // Get the vehicle to edit
    //     $vehicle = Vehicle::findOrFail($id);

    //     // Handle vehicle cover image update (if provided)
    //     if ($request->hasFile('vehicle_cover_image')) {
    //       // Delete the old cover image
    //       $this->deleteVehicleImage($vehicle->vehicle_cover_image);

    //       $imageCoverName = $request['vehicle_name'] . '-cover-image-' . time() . rand(1, 1000) . '.' . $request['vehicle_cover_image']->extension();
    //       $request['vehicle_cover_image']->move(public_path('storage/vehicle_images'), $imageCoverName);
    //       $vehicle->vehicle_cover_image = $imageCoverName;
    //     }

    //     // Delete all existing vehicle images
    //     $this->deleteAllVehicleImages($vehicle->id);

    //     // Update vehicle data
    //     $vehicle->update($request->except('vehicle_cover_image'));

    //     // Add new images (if provided)
    //     foreach ($request->file('images') as $image) {
    //       $imageName = $request['vehicle_name'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
    //       $image->move(public_path('storage/vehicle_images'), $imageName);

    //       Image::create([
    //         'vehicle_id' => $vehicle->id,
    //         'image' => $imageName
    //       ]);
    //     }

    //     $request->flash('success', 'Vehicle edited successfully!');

    //     // Redirect to a relevant route (e.g., product detail page)
    //     return redirect()->route('vehicle.show', $vehicle->id);
    //   }

    //   // Helper function to delete a vehicle image
    //   private function deleteVehicleImage($imagePath) {
    //     if (file_exists(public_path('storage/vehicle_images/' . $imagePath))) {
    //       unlink(public_path('storage/vehicle_images/' . $imagePath));
    //     }
    //   }

    //   // Helper function to delete all vehicle images
    //   private function deleteAllVehicleImages($vehicleId) {
    //     $images = Image::where('vehicle_id', $vehicleId)->get();
    //     foreach ($images as $image) {
    //       $this->deleteVehicleImage($image->image);
    //       $image->delete();
    //     }
    //   }


    // public function editProductLogic(Request $request, $id) {
    //     $request = Validator::make($request->all(), [
    //         'vehicle_type' => 'required',
    //         'vehicle_brand' => 'required',
    //         'vehicle_name' => 'required',
    //         'vehicle_category' => 'required',
    //         'vehicle_transmition' => 'required',
    //         'vehicle_seat_capacity' => 'required',
    //         'vehicle_engine_capacity' => 'required',
    //         'vehicle_fuel_type' => 'required',
    //         'vehicle_fuel_tank_capacity' => 'required',
    //         'vehicle_fuel_consumption' => 'required',
    //         'vehicle_milage' => 'required',
    //         'vehicle_year_production' => 'required|numeric|max:' . date('Y'),
    //         'vehicle_tax' => 'required',
    //         'vehicle_service_fee' => 'required',
    //         'price' => 'required',
    //         'vehicle_status' => 'required',
    //         'vehicle_cover_image' => 'required',
    //         'images'=> 'required'
    //     ]);

    //     if ($request->fails()) {
    //         return redirect()->back()->withErrors($request);
    //     }

    //     $vehicle = Vehicle::find($id);

    //     $vehicle->save();
    //     return redirect('');
    // }

    // public function handleUpdateRecipe(Request $request, $id) {
    //     $validate = Validator::make($request->all(), [
    //         'title' => 'required|string|min:5',
    //         'image' => 'required|mimes:jpg,png,jpeg',
    //         'description' => 'required|string|min:15|max:100',
    //         'price' => 'required|integer|between:1000,10000000',
    //         'author' => 'required|string',
    //     ]);
    //     if ($validate->fails()) {
    //         return redirect()->back()->withErrors($validate);
    //     }
    //     $recipe = Recipe::find($id);
    //     $recipe->title = $request->title;
    //     $recipe->author = $request->author;
    //     $recipe->price = $request->price;
    //     $recipe->description = $request->description;
    //     $recipe->image = basename($request->file('image')->store('recipe', 'public'));
    //     $recipe->save();
    //     return redirect('');
    // }


    public function previewProduct($id){
        $vehicles = Vehicle::find($id);

        $images = $vehicles->images;

        return view('page.product.previewProduct', compact('vehicles', 'images'));
    }
}
