<?php

namespace App\Http\Controllers;

use App\Models\galleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GalleryImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\galleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return galleryImages::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\galleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function edit(galleryImages $galleryImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\galleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = galleryImages::findOrFail($id);
        if ($request->hasFile('image')) {
            $oldpath = public_path() . '/images/' . substr($gallery['image'], strrpos($gallery['image'], '/') + 1);
            if (File::exists($oldpath)) {
                File::delete($oldpath);
            }
            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $gallery->image = url('/') . '/images/' . $filename;
            $path = 'images';
            $file->move($path, $filename);
        }
        $gallery->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\galleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = galleryImages::findOrFail($id);
        $path = public_path() . '/images/' . substr($image['image'], strrpos($image['image'], '/') + 1);

        if (File::exists($path)) {
            File::delete($path);
        }
        DB::table('gallery_images')->where('id', '=', $id)->delete();
    }
}
