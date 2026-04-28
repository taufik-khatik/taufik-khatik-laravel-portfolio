<?php

use App\Services\CloudinaryService;


/** Handle file upload */
if (!function_exists('handleUpload')) {
    // function handleUpload($inputName, $model=null){
    //     try{
    //         if(request()->hasFile($inputName)){
    //             if($model && \File::exists(public_path($model->{$inputName}))) {
    //                 File::delete(public_path($model->{$inputName}));
    //             }

    //             $file = request()->file($inputName);
    //             $fileName = rand().$file->getClientOriginalName();
    //             $file->move(public_path('/uploads'), $fileName);

    //             $filePath = "/uploads/".$fileName;

    //             return $filePath;
    //         }
    //     }catch(\Exception $e){
    //         throw $e;
    //     }
    // }

    function handleUpload($inputName, $model = null, $folder = 'uploads', $type = 'image')
    {
        try {
            if (request()->hasFile($inputName)) {

                // Cloudinary Service Instance
                $cloudinary = new CloudinaryService();

                // Delete old file if exists (Cloudinary)
                if ($model && !empty($model->{$inputName})) {
                    $publicId = $cloudinary->getPublicIdFromUrl($model->{$inputName});
                    $cloudinary->delete($publicId);
                }

                $file = request()->file($inputName);

                // Upload based on type
                if ($type === 'video') {
                    return $cloudinary->uploadVideo($file, $folder);
                } elseif ($type === 'raw') {
                    return $cloudinary->uploadFile($file, $folder);
                } else {
                    return $cloudinary->uploadImage($file, $folder);
                }
            }

            return null;

        } catch (\Exception $e) {
            throw $e;
        }
    }
}

/** Delete file */
if (!function_exists('deleteFileIfExist')) {
    // function deleteFileIfExist($filePath){
    //     try{
    //         if(\File::exists(public_path($filePath))){
    //             \File::delete(public_path($filePath));
    //         }
    //     }catch(\Exception $e){
    //         throw $e;
    //     }
    // }

    function deleteFileIfExist($fileUrl)
    {
        try {
            if (!empty($fileUrl)) {
                $cloudinary = new CloudinaryService();

                $publicId = $cloudinary->getPublicIdFromUrl($fileUrl);

                return $cloudinary->delete($publicId);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

if (!function_exists('getCloudinaryUrl')) {
    function getCloudinaryUrl($publicId)
    {
        $cloudinary = new CloudinaryService();
        return $cloudinary->getSecureUrl($publicId);
    }
}

/** get dynamic colors  */
if (!function_exists('getColor')) {
    function getColor($index){
        $colors = ['#558bff', '#fecc90', '#ff885e', '#282828', '#190844', '#9dd3ff'];
        return $colors[$index % count($colors)];
    }
}

/** Set Sidebar Active  */
if (!function_exists('setSidebarActive')) {
    function setSidebarActive($route){
        if(is_array($route)){
            foreach($route as $r){
                if(request()->routeIs($r)){
                    return 'active';
                }
            }
        }
    }
}

/** Get Seo Setting */
if (!function_exists('seo')) {
    function seo($pageSlug = 'home')
    {
        return \App\Models\SeoSetting::where('page_slug', $pageSlug)->first();
    }
}
