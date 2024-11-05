<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadHelper
{
    /**
     * Upload a file to AWS S3 and return its URL.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fileName
     * @param string $directory
     * @return string|false
     */
    public static function uploadImage(UploadedFile $file, string $fileName, string $directory)
    {
        Log::info('uploadImage start');
        if (!$file->isValid()) {
            Log::error('Uploaded file is not valid.');
            return false; // or throw an exception
        }

        // Generate a random file name with the original extension
        $fileName = Str::random(20) . "." . $file->getClientOriginalExtension();

        Log::info('File Details', [
            'isValid' => $file->isValid(),
            'originalName' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
        ]);
        $directory = "images/" . $directory;
        try {
            // Store the file in the 's3' disk using the generated filename
            $filePath = $file->storeAs($directory, $fileName, 's3'); // Use the generated $fileName

            Log::info('Uploaded File Path', ['filePath' => $filePath]);
            Log::info('Uploaded fileName', ['fileName' => $fileName]);

            // Return the full URL to the file in S3
            return Storage::disk('s3')->url($filePath); // For public access
        } catch (\Exception $exception) {
            // Log the error message
            Log::error('Image upload failed: ' . $exception->getMessage());

            // Optionally, you can return false or throw an exception
            return false; // Indicate failure
        }
    }

    /**
     * Remove a file from AWS S3.
     *
     * @param string $filePath
     * @return bool
     */
    public static function removeImage(string $filePath): bool
    {
        Log::info('removeImage start');
        // Check if the provided path is a valid URL
        if (filter_var($filePath, FILTER_VALIDATE_URL)) {
            // Parse the URL and extract the path
            $parsedUrl = parse_url($filePath);
            // Get the relative path by removing the leading slash
            $filePath = ltrim($parsedUrl['path'], '/');
        }
        try {
            // Attempt to delete the file from the S3 disk
            if (Storage::disk('s3')->exists($filePath)) {
                Storage::disk('s3')->delete($filePath);
                Log::info('File removed successfully', ['filePath' => $filePath]);
                return true; // Indicate success
            } else {
                Log::warning('File not found on S3', ['filePath' => $filePath]);
                return false; // Indicate file not found
            }
        } catch (\Exception $exception) {
            // Log the error message
            Log::error('Image removal failed: ' . $exception->getMessage());
            return false; // Indicate failure
        }
    }
}
