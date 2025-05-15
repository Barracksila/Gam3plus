<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TwoFactorCode extends Notification
{
    use Queueable;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Two-Factor Authentication Code')
            ->greeting('Hello, ' . $notifiable->name)
            ->line('Your 2FA code is: ' . $this->code)
            ->line('The code will expire in 10 minutes.')
            ->line('If you did not request this, please secure your account.');
    }

    public function toArray($notifiable)
    {
        return [
            'two_factor_code' => $this->code,
        ];
    }
}
