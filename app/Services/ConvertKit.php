<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ConvertKit {
    private $api_key;
    private $api_secret;
    private $api_url;

    function __construct()
    {
        $this->api_key = env('CONVERT_KIT_API_KEY');
        $this->api_secret = env('CONVERT_KIT_API_SECRET');
        $this->api_url = env('CONVERT_KIT_URL');
    }

    public function subscribers() {
        $response = Http::get($this->api_url. "/v3/subscribers?api_secret=". $this->api_secret);
        return $response->json();
    }

    public function subscribe($form_id, $email) {
        $response = Http::post($this->api_url. "/v3/forms/".$form_id."/subscribe", [
            "api_key" => $this->api_key,
            "email" => $email,
        ]);
        return $response->json();
    }

    public function unsubscribe($email) {
        $response = Http::put($this->api_url. "/v3/unsubscribe", [
            "api_secret" => $this->api_secret,
            "email" => $email,
        ]);
        return $response->json();
    }
}