<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Testimonial,
};

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Testimonial';

        $data['testimonials'] = Testimonial::get();

        return view('admin.testimonial.index', $data);
    }
}
