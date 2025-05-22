<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;
use App\Models\User;

class ChatDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all chats
        $chats = Chat::all();

        foreach ($chats as $chat) {
            for ($i = 0; $i < rand(3, 10); $i++) {
                $sender = rand(0, 1) ? $chat->funder_id : $chat->staff_id;

                $hasAttachment = rand(0, 1);

                $attachment = null;
                $attachmentType = null;
                $attachmentSize = null;
                $attachmentName = null;

                if ($hasAttachment) {
                    $attachmentTypes = [
                        'image' => 'example.jpg',
                        'video' => 'example.mp4',
                        'pdf' => 'example.pdf',
                        'zip' => 'example.zip',
                    ];

                    $attachmentType = array_rand($attachmentTypes);
                    $attachmentName = $attachmentTypes[$attachmentType];
                    $attachmentSize = rand(100, 5000) . ' KB';
                    $attachment = 'attachments/' . $attachmentName;
                }

                DB::table('chat_details')->insert([
                    'chat_id' => $chat->id,
                    'sender_id' => $sender,
                    'message' => $hasAttachment ? 'This is a message with an attachment.' : 'Lorem Ipsum DOlor Sit Ametaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',
                    'type' => $hasAttachment ? $attachmentType : 'text',
                    'attachment' => $attachment,
                    'attachment_type' => $attachmentType,
                    'attachment_size' => $attachmentSize,
                    'attachment_name' => $attachmentName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
