<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\AsicApplication;

class NewAsicApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    public function __construct(AsicApplication $application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Новая заявка ASIC')
            ->greeting('Здравствуйте!')
            ->line('Поступила новая заявка на сайте.')
            ->line('**Имя**: ' . $this->application->name)
            ->line('**Телефон**: ' . $this->application->phone)
            ->line('**Telegram**: ' . ($this->application->telegram ?? 'Не указан'))
            ->action('Просмотреть в админке', url('/admin/asic-applications/' . $this->application->id))
            ->line('Спасибо!');
    }
}
