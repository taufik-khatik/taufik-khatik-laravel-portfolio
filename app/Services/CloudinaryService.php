<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\UploadedFile;

class CloudinaryService
{
    /**
     * Upload Image
     */
    public function uploadImage(UploadedFile $file, string $folder = 'uploads')
    {
        return Cloudinary::upload(
            $file->getRealPath(),
            [
                'upload_preset' => config('cloudinary.upload_preset'), // Optional
                'folder' => $folder
            ]
        )->getSecurePath(); // Return secure URL
    }

    /**
     * Upload Video
     */
    public function uploadVideo(UploadedFile $file, string $folder = 'uploads')
    {
        return Cloudinary::uploadVideo(
            $file->getRealPath(),
            [
                'upload_preset' => config('cloudinary.upload_preset'), // Optional
                'folder' => $folder
            ]
        )->getSecurePath(); // Return secure URL
    }

    /**
     * Upload Raw File (PDF, ZIP, etc.)
     */
    public function uploadFile(UploadedFile $file, string $folder = 'uploads')
    {
        return Cloudinary::uploadFile(
            $file->getRealPath(),
            [
                'upload_preset' => config('cloudinary.upload_preset'), // Optional
                'folder' => $folder,
                'resource_type' => 'raw'
            ]
        )->getSecurePath(); // Return secure URL
    }

    /**
     * Get Public ID from URL
     *
     * @param string $url (e.g., "https://res.cloudinary.com/mycloud/image/upload/v12345/uploads/abc123.jpg")
     */
    public function getPublicIdFromUrl(string $url)
    {
        $parts = explode('/', $url);
        $file = end($parts);

        // remove extension
        $publicId = substr($file, 0, strrpos($file, '.'));

        // folder + filename
        $folder = prev($parts);

        return $folder . '/' . $publicId;
    }

    /**
     * Delete File by Public ID
     *
     * @param string $publicId (e.g., "uploads/abc123")
     */
    public function delete(string $publicId)
    {
        return Cloudinary::destroy($publicId);
    }

    /**
     * Get Public URL (Non-secure)
     *
     * @param string $publicId
     */
    public function getUrl(string $publicId)
    {
        return Cloudinary::getUrl($publicId);
    }

    /**
     * Get Secure URL (HTTPS)
     *
     * @param string $publicId
     */
    public function getSecureUrl(string $publicId)
    {
        return Cloudinary::getUrl($publicId, ['secure' => true]);
    }

    /**
     * Apply Transformations (e.g., resizing, cropping) to an Image
     *
     * @param string $publicId
     * @param array $options (e.g.,
     * [
     *     'width' => 300,
     *     'height' => 300,
     *     'crop' => 'fill',
     *     'gravity' => 'face',
     *     'quality' => 'auto',
     *     'fetch_format' => 'auto'
     * ]) (optional)
     */
    public function transform(string $publicId, array $options = [])
    {
        return Cloudinary::getUrl($publicId, $options);
    }

    /**
     * Upload File (e.g., image, video, raw)
     *
     * @param UploadedFile $file
     * @param string $folder (optional)
     * @param string $resource (optional) - "image", "video", or "raw"
     */
    public function upload(UploadedFile $file, string $folder = 'uploads', string $resource = 'image')
    {
        return Cloudinary::upload(
            $file->getRealPath(),
            [
                'upload_preset' => config('cloudinary.upload_preset'), // Optional
                'folder' => $folder,
                'resource_type' => $resource
            ]
        );
    }
}
