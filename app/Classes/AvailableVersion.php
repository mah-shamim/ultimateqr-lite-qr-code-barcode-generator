<?php

namespace App\Classes;

use App\Models\Config;
use Illuminate\Support\Facades\Request as serverReq;

class AvailableVersion
{
    // Function to check for available version
    public function availableVersion()
    {
        // Default message
        $server_name = serverReq::server("SERVER_NAME");
        $server_name = $server_name ? $server_name : config('app.url');

        try {
            // Check update validator
            $client = new \GuzzleHttp\Client();
            $res = $client->post(config('app.verify_url').'/check-update', [
                'form_params' => [
                    'purchase_code' => config('app.code'),
                    'server_name' => $server_name,
                    'version' => $this->getConfigValue(33)
                ]
            ]);

            $resp_data = json_decode($res->getBody(), true);

            return $resp_data;
        } catch (\Throwable $th) {
        }
    }

    // Helper function to get config value
    private function getConfigValue($index)
    {
        $config = Config::get();

        return $config[$index]->config_value;
    }
}
