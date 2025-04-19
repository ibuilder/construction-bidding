<?php
// Supabase configuration settings
define('SUPABASE_URL', 'https://your-supabase-url.supabase.co');
define('SUPABASE_KEY', 'your-supabase-anon-key');

// Function to get Supabase client
function getSupabaseClient() {
    $url = SUPABASE_URL;
    $key = SUPABASE_KEY;

    // Initialize cURL
    $client = curl_init();
    curl_setopt($client, CURLOPT_URL, $url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($client, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $key,
        'Content-Type: application/json',
    ]);

    return $client;
}
?>