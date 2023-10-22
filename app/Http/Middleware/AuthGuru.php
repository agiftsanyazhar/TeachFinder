<?php

namespace App\Http\Middleware;

use App\Models\Guru;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->input('guru_id');

        $guru = Guru::with('lokasi', 'user')
            ->whereHas('user', function ($query) {
                $query->where('role_id', 2);
            })
            ->where('id', $id)
            ->first();

        if (!$guru) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $request->attributes->add(['guru' => $guru]);

        return $next($request);
    }
}
