<?php

namespace App\Services;

use App\Models\NadraApiLog;
use Illuminate\Support\Facades\Http;

class Pmd
{
    public function __construct() {}

    public function fetchData($cnic)
    {
        $error_msg = null;
        $result = null;
        $trans_type = 'error';
        $nadraData = NadraApiLog::where('cnic', $cnic)->where('api_name', 'pmd')->where('is_found', 1)->orderBy('id', 'desc')->first();
        if (! empty($nadraData)) {
            return json_decode($nadraData->response, true);
        }
        try {

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => config('custom.nadra_X_API_KEY'),
            ])->post(config('custom.pmd_url'), [
                'scope' => config('custom.nadra_scope'),
                'grant_type' => config('custom.pmd_grant_type'),
                'client_id' => config('custom.nadra_client_id'),
                'client_secret' => config('custom.nadra_client_secret'),
                'project' => config('custom.nadra_project'),
            ]);

            if ($response->successful()) {

                $data = $response->json();
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.$data['token'],
                    'X-API-KEY' => config('custom.pmd_X_API_KEY'),
                    'Grant-Type' => config('custom.pmd_grant_type'),
                    'Project' => config('custom.nadra_project'),
                ])->post(config('custom.pmd_url2'), [
                    'cnic' => $cnic,
                ]);
                // dd($response, $response->json(), $response->successful());
                $result = $response->json();
                $trans_type = 'success';
            } else {
                // Handle error
                $error_msg = $response->body();
            }
            // Log the API request and response
            NadraApiLog::create([
                'cnic' => $cnic,
                'request' => config('custom.pmd_url2'),
                'response' => $response->body(),
                'is_found' => ((isset($result) && $result['code'] == '200') ? 1 : 0),
                'curl_error_msg' => $error_msg,
                'success_or_error' => $trans_type,
                'api_name' => 'pmd',
            ]);

            return $result;
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            NadraApiLog::create([
                'cnic' => $cnic,
                'request' => config('custom.pmd_url2'),
                'response' => null,
                'curl_error_msg' => $e->getMessage(),
                'success_or_error' => 'error',
                'api_name' => 'pmd',
            ]);

            // if (env('APP_ENV') === 'local')
            // {
            //     return ['error' => 'Unable to connect to the external API.'];
            // }
            // else
            // {
            return ['error' => 'PLRA API is not responding.'];
            // }
        }
    }
}
