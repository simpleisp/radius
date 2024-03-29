<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Schema; // Import the Schema facade
use App\Models\EmailConversation;

class SupportComposer
{
    public function compose(View $view)
    {
        // Check if the 'radius' database connection is configured
        if (config('database.connections.mysql.database') === 'radius') {
            // Check if the 'email_conversations' table exists in the 'radius' database
            if (Schema::connection('mysql')->hasTable('email_conversations')) {
                $unreadCount = EmailConversation::where('is_read', false)->count();
                $view->with('unreadCount', $unreadCount);
            } else {
                // Handle the case when the 'email_conversations' table does not exist in 'radius'
                $view->with('unreadCount', 0); // You can set a default value or handle it as needed
            }
        } else {
            // Handle the case when the 'radius' database connection is not configured
            $view->with('unreadCount', 0); // You can set a default value or handle it as needed
        }
    }
}
