<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function sendToTelegram(Request $request)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chat_id = env('CHAT_ID');

        // message to telegram bot
        $message = "New Ordered\n";
        $message .= "--------------------------------------------------------\n";
        $message .= "- Name: " . $request->name . "\n";
        $message .= "- Description: " . $request->description . "\n";
        $message .= "- Price: $" . $request->price . "\n";
        $message .= "- Image URL: " . $request->image;


        // Send the message to Telegram
        $url = "https://api.telegram.org/bot$token/sendMessage";

        $data = [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML'
        ];

        file_get_contents($url . '?' . http_build_query($data));

        return redirect()->back()->with('success', 'Order sent to Telegram!');
    }
}
