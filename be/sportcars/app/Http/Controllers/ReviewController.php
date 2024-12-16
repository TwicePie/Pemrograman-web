<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'review' => 'required|string',
        ]);
    
        $review = Review::create([
            'car_name' => $request->car_name,
            'review' => $request->review,
            'created_at' => now(), // Tambahkan created_at secara manual
        ]);
    
        return response()->json($review, 201);
    }

    public function show($id)
    {
        return response()->json(Review::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'car_name' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        $review->update($request->all());

        return response()->json($review);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(null, 204);
    }
}
