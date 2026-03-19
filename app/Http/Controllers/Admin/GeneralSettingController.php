<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('setting'));
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = GeneralSetting::first();

        $request->validate([
            'logo' => [$setting ? 'nullable' : 'required', 'image', 'max:5000'],
            'footer_logo' => [$setting ? 'nullable' : 'required', 'image', 'max:5000'],
            'favicon' => [$setting ? 'nullable' : 'required', 'image', 'max:5000'],
        ]);

        $logo = handleUpload('logo', $setting);
        $footer_logo = handleUpload('footer_logo', $setting);
        $favicon = handleUpload('favicon', $setting);

        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
                'logo' => $logo ?? $setting?->logo,
                'footer_logo' => $footer_logo ?? $setting?->footer_logo,
                'favicon' => $favicon ?? $setting?->favicon,
            ]
        );

        toastr('Update Successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
