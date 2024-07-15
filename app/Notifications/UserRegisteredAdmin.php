<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Orchid\Platform\Notifications\DashboardChannel;
use Orchid\Platform\Notifications\DashboardMessage;

class UserRegisteredAdmin extends Notification
{
    use Queueable;

    public $id;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return [DashboardChannel::class];
    }

    public function toDashboard($notifiable)
    {
        $url = env('APP_URL/');
    return (new DashboardMessage)
        ->title('Новый пользователь!')
        ->message('Пользователь прикрепил файл при регистрации. Возможно, ему нужно выдать права выпускника')
        ->action(url("$url/admin/users?sort=-created_at"));
    }
}
