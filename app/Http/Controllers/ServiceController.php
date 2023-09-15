<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Service::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service();
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'best' => 'required'
        ]);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->best = $request->best;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'images';
            $file->move($path, $filename);
            $service->icon = url('/') . '/images/' . $filename;
        }

        $service->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Service::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $service->title = $request->title;
        $service->best = $request->best;
        $service->description = $request->description;
        if ($request->hasFile('icon')) {
            $oldpath = public_path() . '/images/' . substr($service['icon'], strrpos($service['icon'], '/') + 1);
            if (File::exists($oldpath)) {
                File::delete($oldpath);
            }
            $file = $request->file('icon');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $service->icon = url('/') . '/images/' . $filename;
            $path = 'images';
            $file->move($path, $filename);
        }

        $service->save();
    }



    /**
     * Get All Best Services
     */

    public function bestServices()
    {
        return Service::where('best', 1)->get();
    }

    /**
     * Get All UnBest Services
     */

    public function unbestservices()
    {
        return Service::where('best', 0)->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $path = public_path() . '/images/' . substr($service['icon'], strrpos($service['icon'], '/') + 1);
        if (File::exists($path)) {
            File::delete($path);
        }
        DB::table('services')->where('id', '=', $id)->delete();
    }
}
