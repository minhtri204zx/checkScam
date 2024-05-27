<?php

namespace App\Listeners;

use App\Events\UpdateView;
use App\Models\Viewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ListenerUpdateView
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UpdateView  $event
     * @return void
     */
    public function handle(UpdateView $event)
    {
        $data = $event->data;
        $id = $event->id;
        $response = Http::get('https://api.ipify.org');
        $address = Http::get('http://ip-api.com/php/' . $response);
        $address = unserialize($address);
        Viewer::create([
            'account_id' => Auth::id()?Auth::id():NULL,
            'post_id'=> $id,
            'country' => $address['country'],
            'device' => $data['device'],
            'platform' => $data['platform']
        ]);
    }
}
