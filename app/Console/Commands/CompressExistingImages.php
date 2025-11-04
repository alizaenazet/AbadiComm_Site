<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PortfolioImage;
use App\Models\GalleryActivity;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class CompressExistingImages extends Command
{
    protected $signature = 'images:compress';
    protected $description = 'Compress all existing images in storage';

    public function handle()
    {
        $this->info('Starting image compression...');

        // Create ImageManager instance (use once, reuse for all images)
        $manager = new ImageManager(new Driver());

        // Compress Portfolio Images
        $this->info('Compressing portfolio images...');
        $portfolioImages = PortfolioImage::all();

        if ($portfolioImages->isEmpty()) {
            $this->warn('No portfolio images found.');
        } else {
            $bar = $this->output->createProgressBar(count($portfolioImages));

            foreach ($portfolioImages as $image) {
                try {
                    // Get the file path (remove /storage/ prefix)
                    $oldPath = str_replace('/storage/', '', $image->image_url);

                    // Check if file exists
                    if (!Storage::disk('public')->exists($oldPath)) {
                        $this->warn("\nImage not found: {$oldPath}");
                        $bar->advance();
                        continue;
                    }

                    // Get full path for reading
                    $fullPath = Storage::disk('public')->path($oldPath);

                    // Compress: resize to max 1920px width, 75% quality
                    $compressed = $manager->read($fullPath)
                        ->scaleDown(width: 1920)  // Scales down keeping aspect ratio
                        ->toJpeg(quality: 75);    // 75% quality = good balance

                    // Create backup (optional, but safe!)
                    $backupPath = 'backups/' . $oldPath;
                    Storage::disk('public')->copy($oldPath, $backupPath);

                    // Replace original with compressed version
                    Storage::disk('public')->put($oldPath, (string) $compressed);

                    $bar->advance();
                } catch (\Exception $e) {
                    $this->error("\nError compressing {$image->image_url}: " . $e->getMessage());
                    $bar->advance();
                }
            }

            $bar->finish();
            $this->info("\n\nPortfolio images compressed!");
        }

        // Compress Gallery Images (same process)
        $this->info('Compressing gallery images...');
        $galleryImages = GalleryActivity::all();

        if ($galleryImages->isEmpty()) {
            $this->warn('No gallery images found.');
        } else {
            $bar = $this->output->createProgressBar(count($galleryImages));

            foreach ($galleryImages as $gallery) {
                try {
                    $oldPath = str_replace('/storage/', '', $gallery->image_url);

                    if (!Storage::disk('public')->exists($oldPath)) {
                        $this->warn("\nImage not found: {$oldPath}");
                        $bar->advance();
                        continue;
                    }

                    $fullPath = Storage::disk('public')->path($oldPath);

                    $compressed = $manager->read($fullPath)
                        ->scaleDown(width: 1920)
                        ->toJpeg(quality: 75);

                    $backupPath = 'backups/' . $oldPath;
                    Storage::disk('public')->copy($oldPath, $backupPath);

                    Storage::disk('public')->put($oldPath, (string) $compressed);

                    $bar->advance();
                } catch (\Exception $e) {
                    $this->error("\nError compressing {$gallery->image_url}: " . $e->getMessage());
                    $bar->advance();
                }
            }

            $bar->finish();
            $this->info("\n\nGallery images compressed!");
        }

        // Clear Laravel cache so new images load
        Cache::flush();
        $this->info('Cache cleared!');

        $this->info("\n🎉 All done! Your images are now compressed!");
        $this->info('💾 Original images backed up to: storage/app/public/backups/');
    }
}
