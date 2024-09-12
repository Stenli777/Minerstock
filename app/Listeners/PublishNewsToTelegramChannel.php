<?php

namespace App\Listeners;

use App\Events\NewsPublished;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;
use Exception;


class PublishNewsToTelegramChannel
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewsPublished  $event
     * @return void
     */
    public function handle(NewsPublished $event = null)
    {
        $post = $event->post;
        $post->content = preg_replace('/<h4>Оглавление:<\/h4>\s*<ul>.*?<\/ul>/is', '', $post->content);

        $plainTextContent = htmlspecialchars_decode(strip_tags($post->content));
        $excerpt = mb_substr($plainTextContent, 0, 400) . "...";
        if($post::class === 'App\Models\App'){
            $message = "⚡⚡⚡*{$post->title}*\n\n{$excerpt}\n\n[" . "Читайте новость на сайте..." . "](" . url('/app/' . $post->alias) . ")";
        } else if($post->is_news === 1){
            $message = "⚡⚡⚡*{$post->title}*\n\n{$excerpt}\n\n[" . "Читайте новость на сайте..." . "](" . url('/new/' . $post->alias) . ")";
        } else {
            $message = "🔥🔥🔥*{$post->title}*\n\n{$excerpt}\n\n[" . "Читайте статью на сайте..." . "](" . url('/post/' . $post->alias) . ")";
        }
        Log::debug($message);

        $imagePath = public_path("/storage/".$post->img);
        $absoluteImagePath = realpath($imagePath);

        if ($absoluteImagePath === false) {
            throw new Exception("File not found: {$imagePath}");
        }

        $telegramFile = Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '@mineinforu'),
            'photo' => fopen($absoluteImagePath, 'r'),
            'caption' => $message,
            'parse_mode' => 'Markdown',
        ]);

        if (!$telegramFile) {
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '@mineinforu'),
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);
        }
    }
}
