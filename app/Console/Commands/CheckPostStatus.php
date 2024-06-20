<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;
use Bschmitt\Amqp\Facades\Amqp;

class CheckPostStatus extends Command
{
    protected $signature = 'posts:check-status';
    protected $description = 'Check posts older than two days and mark them as inactive';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $posts = Post::where('created_at', '<=', Carbon::now()->subDays(2))
            ->where('active', true)
            ->get();

        foreach ($posts as $post) {
            Amqp::publish('post_status', json_encode(['id' => $post->id]), ['queue' => 'post_status_queue']);
        }

        $this->info('All old posts have been checked and sent to the queue.');
    }
}
