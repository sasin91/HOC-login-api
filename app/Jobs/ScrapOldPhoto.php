<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ScrapOldPhoto implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $model;
    public $disk;
    public $attribute;

    public function __construct($model, $disk, $attribute = 'photo_path')
    {
        $this->model = $model;
        $this->disk = $disk;
        $this->attribute = $attribute;
    }

    public function handle()
    {
        Storage::disk($this->disk)->delete($this->model->getOriginal($this->attribute));
    }
}
