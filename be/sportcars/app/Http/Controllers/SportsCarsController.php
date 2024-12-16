<?php

namespace App\Http\Controllers;

use App\Models\SportsCars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportsCarsController extends Controller
{
    // Menampilkan semua data sports cars
    public function index()
    {
        $cars = SportsCars::all();
        return response()->json($cars);
    }

    // Menambahkan data baru ke tabel sports_cars
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = time() . '.' . $request->file('image')->extension();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');

        $car = SportsCars::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $path,
        ]);

        return response()->json($car, 201);
    }

    // Menampilkan detail data berdasarkan ID
    public function show($id)
    {
        $car = SportsCars::findOrFail($id);
        return response()->json($car);
    }

    // Mengupdate data berdasarkan ID
    public function update(Request $request, $id)
    {
        $car = SportsCars::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($car->image_url);
            
            // Simpan gambar baru
            $fileName = time() . '.' . $request->file('image')->extension();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $car->image_url = $path;
        }

        // Update data lainnya
        $car->update($request->only(['name', 'brand', 'price', 'stock']));

        return response()->json($car);
    }

    // Menghapus data berdasarkan ID
    public function destroy($id)
    {
        $car = SportsCars::findOrFail($id);

        // Hapus gambar terkait
        Storage::disk('public')->delete($car->image_url);

        // Hapus data
        $car->delete();

        return response()->json(null, 204);
    }
}
