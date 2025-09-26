<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAdminNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New User Registered')
            ->line('A new user has registered: ' . $this->user->name)
            ->action('View User', url('/admin/users/' . $this->user->id));
    }

    public function toDatabase(object $notifiable)
    {
        // this data stored in the notifications table
        // laravel will automatically convert it to json and s
         return [
        'message' => 'New user registered: ' . $this->user->name,
        'user_id' => $this->user->id,
        'email' => $this->user->email,
    ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
