<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Magazine;
use Illuminate\Support\Facades\Storage;

class MagazineAdminController extends Controller
{
    public function index()
    {
        $magazines = Magazine::latest()->get();
        return view('admin.magazines.index', compact('magazines'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.magazines.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'release_date' => 'required|date',
            'cover' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $path = $request->file('cover')->store('covers', 'public');

        Magazine::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'release_date' => $request->release_date,
            'featured' => $request->has('featured'),
            'cover' => $path,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.magazines.index')->with('success', 'Magazin dodat.');
    }

    public function edit(Magazine $magazine)
    {
        $categories = \App\Models\Category::all();
        return view('admin.magazines.edit', compact('magazine', 'categories'));
    }


    public function update(Request $request, Magazine $magazine)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'release_date' => 'required|date',
            'cover' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',

        ]);

        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($magazine->cover);
            $magazine->cover = $request->file('cover')->store('covers', 'public');
        }

        $magazine->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'release_date' => $request->release_date,
            'featured' => $request->has('featured'),
            'category_id' => $request->category_id,

        ]);

        $magazine->save();

        return redirect()->route('admin.magazines.index')->with('success', 'Magazin izmenjen.');
    }

    public function destroy(Magazine $magazine)
    {
        Storage::disk('public')->delete($magazine->cover);
        $magazine->delete();

        return redirect()->route('admin.magazines.index')->with('success', 'Magazin obrisan.');
    }
}
