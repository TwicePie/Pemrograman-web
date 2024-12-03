<?php
namespace App\Http\Controllers;

use App\Models\SportsCars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportsCarsController extends Controller
{
    public function index()
    {
        return response()->json(SportsCars::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $car = SportsCars::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'image_url' => $path,
        ]);

        return response()->json($car, 201);
    }

    public function show($id)
    {
        return response()->json(SportsCars::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $car = SportsCars::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($car->image_url);
            $path = $request->file('image')->store('images', 'public');
            $car->image_url = $path;
        }

        $car->update($request->only(['name', 'brand', 'price']));

        return response()->json($car);
    }

    public function destroy($id)
    {
        $car = SportsCars::findOrFail($id);
        Storage::disk('public')->delete($car->image_url);
        $car->delete();

        return response()->json(null, 204);
    }
}
