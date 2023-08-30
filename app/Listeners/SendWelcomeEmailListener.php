<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Google\Cloud\Core\ServiceBuilder;
use Google\Cloud\PubSub\PubSubClient;
use App\Events\SendWelcomeEmail;

class SendWelcomeEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendWelcomeEmail $event)
    {
        $serviceB = new ServiceBuilder([
            'credentials' => json_decode(env('GOOGLE_CLOUD_CONFIG'), true),
        ]);

        $pubsub = $serviceB->pubsub();

       
       /*  $pubsub = new PubSubClient([
            'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
        ]);
 */
        $subscriptionName = env('PUBSUB_SUBSCRIPTION_NAME');

        $subscription = $pubsub->subscription($subscriptionName);
        $message = [
            'email' => $event->email,
            'name' => $event->name,
        ];
        $subscription->publish(['data' => json_encode($message)]);
    }
}
