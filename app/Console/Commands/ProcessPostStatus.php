<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Bschmitt\Amqp\Facades\Amqp;

class ProcessPostStatus extends Command
{
    protected $signature = 'posts:process-status';
    protected $description = 'Process post status from the queue';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Amqp::consume('post_status_queue', function ($message, $resolver) {
            $data = json_decode($message->body, true);
            $post = Post::find($data['id']);

            if ($post) {
                $post->update(['active' => false]);
                $this->info('Post ID ' . $post->id . ' has been marked as inactive.');
            }

            $resolver->acknowledge($message);
        });

        $this->info('All messages have been processed.');
    }
}
