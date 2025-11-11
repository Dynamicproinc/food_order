<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\SSENotification;

class SSEController extends Controller
{
    //  public function stream()
    // {
    //     // Set the appropriate headers for SSE
    //     $response = new StreamedResponse(function () {
    //         while (true) {
    //             // Your server-side logic to get data
    //             $data = json_encode(['message' => 'This is a message']);

    //             echo "data: $data\n\n";

    //             // Flush the output buffer
    //             ob_flush();
    //             flush();

    //             // Delay for 1 second
    //             sleep(1);
    //         }
    //     });

    //     $response->headers->set('Content-Type', 'text/event-stream');
    //     $response->headers->set('Cache-Control', 'no-cache');
    //     $response->headers->set('Connection', 'keep-alive');

    //     return $response;
    // }

    public function sendSSE(){

        
        
        $notifications = SSENotification::where('read', false)->first();
        
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');  
        if($notifications){
            $event_data  = [
                'notifications' => $notifications->message
            ];

            echo "data: ".json_encode($event_data)."\n\n";
            $notifications->update(['read' => true]);
        }else{
            echo "\n\n";
        }
        ob_flush();
        flush();

    }
}
