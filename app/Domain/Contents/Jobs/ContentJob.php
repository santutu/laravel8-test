<?php

namespace App\Domain\Contents\Jobs;

use App\Domain\Contents\Models\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ContentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle()
    {
        $content = new Content();
        $content->title = "jon title";
        $content->content = "jon con";
        $content->author = "jon au";
//        $content-

    }
}
