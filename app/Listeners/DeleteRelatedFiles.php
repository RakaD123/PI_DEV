<?php

namespace App\Listeners;

use App\Models\delete1;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteRelatedFiles
{
    /**
     * Handle the event.
     *
     * @param  YourModel  $model
     * @return void
     */
    public function handle(delete1 $model)
    {
        // Ambil nama kolom gambar Anda dan hapus filenya
        $imagePath = $model->gambar; // Sesuaikan dengan nama kolom Anda

        if ($imagePath) {
            Storage::delete($imagePath);
        }
    }
}
