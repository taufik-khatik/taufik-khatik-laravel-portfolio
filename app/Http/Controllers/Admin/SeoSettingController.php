<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SeoSettingDataTable;
use Illuminate\Support\Facades\Route;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SeoSettingDataTable $dataTable)
    {
        return $dataTable->render('admin.setting.seo-setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.seo-setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_slug' => ['required', 'max:200', 'unique:seo_settings,page_slug'],

            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'keywords' => ['required', 'max:300'],

            'og_enabled' => ['nullable', 'in:on,off'],
            'og_title' => ['nullable', 'required_if:og_enabled,on', 'max:200'],
            'og_description' => ['nullable', 'required_if:og_enabled,on', 'max:500'],
            'og_image' => ['nullable', 'required_if:og_enabled,on', 'url'],

            'twitter_enabled' => ['nullable', 'in:on,off'],
            'twitter_title' => ['nullable', 'required_if:twitter_enabled,on', 'max:200'],
            'twitter_description' => ['nullable', 'required_if:twitter_enabled,on', 'max:500'],
            'twitter_image' => ['nullable', 'required_if:twitter_enabled,on', 'url'],

            'canonical_url' => ['nullable', 'url'],
            'robots' => ['required', 'max:50', 'regex:/^(index|noindex),(follow|nofollow)$/'],
        ]);

        // Validate that the page_slug corresponds to an actual route in web.php
        $routeExists = false;
        $allRoutes = Route::getRoutes();

        foreach ($allRoutes as $route) {
            // Check if page_slug matches route name or URI parameter
            if (
                $route->getName() === $request->page_slug ||
                str_contains($route->uri(), $request->page_slug)
            ) {
                $routeExists = true;
                break;
            }
        }

        if (!$routeExists) {
            toastr()->error('Invalid page slug. Route does not exist in web.php', 'Error');
            return redirect()->back();
        }

        SeoSetting::create([
            'page_slug' => $request->page_slug,

            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,

            'og_enabled' => $request->og_enabled ? true : false,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_image' => $request->og_image,

            'twitter_enabled' => $request->twitter_enabled ? true : false,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
            'twitter_image' => $request->twitter_image,

            'canonical_url' => $request->canonical_url,
            'robots' => $request->robots
        ]);

        toastr()->success('Created Successfully', 'Congrats');

        return redirect()->route('admin.seo-setting.index');
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
        $seo = SeoSetting::findOrFail($id);
        return view('admin.setting.seo-setting.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'page_slug' => ['required', 'max:200', 'unique:seo_settings,page_slug,' . $id],

            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'keywords' => ['required', 'max:300'],

            'og_enabled' => ['nullable', 'in:on,off'],
            'og_title' => ['nullable', 'required_if:og_enabled,on', 'max:200'],
            'og_description' => ['nullable', 'required_if:og_enabled,on', 'max:500'],
            'og_image' => ['nullable', 'required_if:og_enabled,on', 'url'],

            'twitter_enabled' => ['nullable', 'in:on,off'],
            'twitter_title' => ['nullable', 'required_if:twitter_enabled,on', 'max:200'],
            'twitter_description' => ['nullable', 'required_if:twitter_enabled,on', 'max:500'],
            'twitter_image' => ['nullable', 'required_if:twitter_enabled,on', 'url'],

            'canonical_url' => ['nullable', 'url'],
            'robots' => ['required', 'max:50', 'regex:/^(index|noindex),(follow|nofollow)$/'],
        ]);

        // Validate that the updated page_slug corresponds to an actual route in web.php
        $routeExists = false;
        $allRoutes = Route::getRoutes();

        foreach ($allRoutes as $route) {
            if (
                $route->getName() === $request->page_slug ||
                str_contains($route->uri(), $request->page_slug)
            ) {
                $routeExists = true;
                break;
            }
        }

        if (!$routeExists) {
            toastr()->error('Invalid page slug. Route does not exist in web.php', 'Error');
            return redirect()->back()->withInput();
        }

        $seo = SeoSetting::findOrFail($id);

        $seo->update([
            'page_slug' => $request->page_slug,
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,

            'og_enabled' => $request->og_enabled ? true : false,
            'og_title' => $request->og_enabled ? $request->og_title : null,
            'og_description' => $request->og_enabled ? $request->og_description : null,
            'og_image' => $request->og_enabled ? $request->og_image : null,

            'twitter_enabled' => $request->twitter_enabled ? true : false,
            'twitter_title' => $request->twitter_enabled ? $request->twitter_title : null,
            'twitter_description' => $request->twitter_enabled ? $request->twitter_description : null,
            'twitter_image' => $request->twitter_enabled ? $request->twitter_image : null,

            'canonical_url' => $request->canonical_url ?? null,
            'robots' => $request->robots,
        ]);

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->route('admin.seo-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seo = SeoSetting::findOrFail($id);
        $seo->delete();
    }
}
