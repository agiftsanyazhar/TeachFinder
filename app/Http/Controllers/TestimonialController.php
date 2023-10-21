<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::with('pengirim', 'penerima')->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'data' => $testimonial,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'pengirim_id', 'penerima_id', 'description', 'nilai',
        ]);

        try {
            $request->validate([
                'description' => 'required|string',
                'nilai' => 'required|integer',
            ]);

            Testimonial::create($data);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                    'testimonial' => $data,
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal. ' . $e->getMessage(),
                ]
            );
            Log::debug($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->only([
            'description', 'nilai',
        ]);

        $createdAt = $testimonial->getOriginal('created_at');
        $currentDate = Carbon::now();
        $interval = $createdAt->diff($currentDate);
        $daysDifference = $interval->days;

        $data['updated_at'] = $currentDate;

        if ($daysDifference < 8) {
            try {
                $request->validate([
                    'description' => 'required|string',
                    'nilai' => 'required|integer|min:1|max:5',
                ]);

                $testimonial->update($data);

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Success.',
                        'pesanan' => $data,
                    ]
                );
            } catch (\Exception $e) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Gagal. ' . $e->getMessage(),
                    ]
                );
                Log::debug($e->getMessage());
            }
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Anda dapat mengedit testimonial maksimal 7 hari setelah memberikan testimonial pertama.',
                ]
            );
        }
    }
}
