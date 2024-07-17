<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CleanupImages extends Command
{
    protected $signature = 'cleanup:images';

    protected $description = 'Cleanup old uploaded and converted images';

    public function handle()
    {
        $this->cleanupUploadedImages();
        $this->cleanupConvertedImages();
    }

    protected function cleanupUploadedImages()
    {
        $oneHourAgo = Carbon::now()->subHours(1);
        $uploadedPath = 'uploads/';

        $files = Storage::disk('public')->files($uploadedPath);

        foreach ($files as $file) {
            $fileLastModified = Storage::disk('public')->lastModified($file);
            $fileModifiedTime = Carbon::createFromTimestamp($fileLastModified);

            if ($fileModifiedTime->lt($oneHourAgo)) {
                Storage::disk('public')->delete($file);
                $this->info('Deleted uploaded image: ' . $file);
            }
        }
    }

    protected function cleanupConvertedImages()
    {
        $oneHourAgo = Carbon::now()->subHours(1);
        $convertedPath = 'converted/';

        $files = Storage::disk('public')->files($convertedPath);

        foreach ($files as $file) {
            $fileLastModified = Storage::disk('public')->lastModified($file);
            $fileModifiedTime = Carbon::createFromTimestamp($fileLastModified);

            if ($fileModifiedTime->lt($oneHourAgo)) {
                Storage::disk('public')->delete($file);
                $this->info('Deleted converted image: ' . $file);
            }
        }
    }
}
