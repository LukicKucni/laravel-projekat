<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;

class PublicController extends Controller
{
    /**
     * Display a listing of the magazines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured = Magazine::where('featured', true)->get();
        return view('public.index', compact('featured'));
    }

    public function katalog(Request $request)
    {
        $categories = \App\Models\Category::all();

        $query = \App\Models\Magazine::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $magazines = $query->get();

        return view('public.katalog', compact('magazines', 'categories'));
    }


    /**
     * Display the specified magazine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('public.show', compact('magazine'));
    }

    public function kontakt()
    {
        return view('public.kontakt');
    }
}
