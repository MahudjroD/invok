<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectCreated extends Notification
{
	use Queueable;
	
	protected $details;
	
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($details)
	{
		$this->details = $details;
	}
	
	/**
	 * Get the notification's delivery channels.
	 *
	 * @param mixed $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return ['mail'];
	}
	
	/**
	 * Get the mail representation of the notification.
	 *
	 * @param mixed $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		return (new MailMessage)
			->error()
			->from('harold97@gmail.com','Harold Leroy')
			->subject('project Created')
			->greeting($this->details['greeting'])
			->line($this->details['body'])
			->action('View project', $this->details['actionURL'])
			->line($this->details['thanks']);
		
	}
	
	
	/**
	 * Get the array representation of the notification.
	 *
	 * @param mixed $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
