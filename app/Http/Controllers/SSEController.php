<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\SSENotification;

class SSEController extends Controller
{
    

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
