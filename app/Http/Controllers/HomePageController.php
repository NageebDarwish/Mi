<?php

namespace App\Http\Controllers;

use App\Models\homePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        homePage::all();
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
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(homePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(homePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homePage $homePage)
    {
        $homePage = HomePage::findOrFail(1);
        $request->validate([
            'landing_title_en' => 'required',
            'landing_title_ar' => 'required',
            'landing_desc_en' => 'required',
            'landing_desc_ar' => 'required',
            'about_title_en' => 'required',
            'about_title_ar' => 'required',
            'about_desc_en' => 'required',
            'about_desc_ar' => 'required',
        ]);
        $homePage->landing_title_en = $request->landing_title_en;
        $homePage->landing_title_ar = $request->landing_title_ar;
        $homePage->landing_desc_en = $request->landing_desc_en;
        $homePage->landing_desc_ar = $request->landing_desc_ar;
        $homePage->about_title_en = $request->about_title_en;
        $homePage->about_title_ar = $request->about_title_ar;
        $homePage->about_title_ar = $request->about_title_ar;
        $homePage->about_desc_en = $request->about_desc_en;
        $homePage->about_desc_ar = $request->about_desc_ar;

        if ($request->hasFile('landing_image')) {
            $oldpath = public_path() . '/images/' . substr($homePage['landing_image'], strrpos($homePage['landing_image'], '/') + 1);
            if (File::exists($oldpath)) {
                File::delete($oldpath);
            }
            $file = $request->file('landing_image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $homePage->landing_image = url('/') . '/images/' . $filename;
            $path = 'images';
            $file->move($path, $filename);
        }
        if ($request->hasFile('about_image')) {
            $oldpath = public_path() . '/images/' . substr($homePage['about_image'], strrpos($homePage['about_image'], '/') + 1);
            if (File::exists($oldpath)) {
                File::delete($oldpath);
            }
            $file = $request->file('about_image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $homePage->about_image = url('/') . '/images/' . $filename;
            $path = 'images';
            $file->move($path, $filename);
        }
        $homePage->save();
        return $homePage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(homePage $homePage)
    {
        //
    }
}
