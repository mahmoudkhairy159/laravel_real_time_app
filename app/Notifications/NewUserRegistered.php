<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;

    protected $newUser;
    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->newUser = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id'=>$this->newUser->id,
            'name'=>$this->newUser->name,
            'email'=>$this->newUser->email,
            'title'=> 'New user registered',
            'message'=> 'new user registered called '. $this->newUser->name
        ];
    }
}
