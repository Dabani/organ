<?php

namespace Dabani\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Mail;
use Winter\Storm\Support\Facades\Input;


class ContactForm extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Contact Form',
      'description' => 'Simple contact form'
    ];
  }

  public function onSend()
  {
    // These variables are available inside the message as Twig
    $vars = [
      'name' => Input::get('name'),
      'email' => Input::get('email'),
      'content' => Input::get('content')
    ];

    Mail::send('dabani.contact::mail.message', $vars, function ($message) {

      $message->to('info@rasal.rw', 'Robert Makuta');
      $message->subject('New message from contact form');
    });
  }
}
