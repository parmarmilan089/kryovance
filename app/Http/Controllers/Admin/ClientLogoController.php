<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['title'] = 'Client Logos';
        $data['menu_active_tab'] = 'client-logos';
        $logos = ClientLogo::all();
        return view('admin.client_logo.index', compact('logos'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = 'Add Client Logo';
        $data['menu_active_tab'] = 'client-logos';
        return view('admin.client_logo.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('client_logos', 'public');

        ClientLogo::create([
            'title' => $request->title,
            'image_path' => $path,
        ]);

        return redirect()->route('client-logos.index')->with('success', 'Client logo added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $logo = ClientLogo::findOrFail($id);
        $data = [];
        $data['title'] = 'Edit Client Logo';
        $data['menu_active_tab'] = 'client-logos';
        return view('admin.client_logo.edit', compact('logo'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $logo = ClientLogo::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = ['title' => $request->title];
        if ($request->hasFile('image')) {
            // Delete old image
            if ($logo->image_path && Storage::disk('public')->exists($logo->image_path)) {
                Storage::disk('public')->delete($logo->image_path);
            }
            $data['image_path'] = $request->file('image')->store('client_logos', 'public');
        }
        $logo->update($data);

        return redirect()->route('client-logos.index')->with('success', 'Client logo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $logo = ClientLogo::findOrFail($id);
        if ($logo->image_path && Storage::disk('public')->exists($logo->image_path)) {
            Storage::disk('public')->delete($logo->image_path);
        }
        $logo->delete();
        return redirect()->route('client-logos.index')->with('success', 'Client logo deleted successfully.');
    }
}
