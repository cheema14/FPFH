<?php

namespace App\Http\Controllers\Traits;

use DB;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait SmsApi
{
    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function send_sms($cnic, $mobile_no, $message, $language, $action)
    {

        $sent = 0;
        $client = new \GuzzleHttp\Client([
            'verify' => false, // This line disables SSL verification
        ]);
        try {
            $api_response = $client->request('POST', 'https://smsgateway.pitb.gov.pk/api/send_sms?sec_key=dae3ab8503a03dc0c2675aca4a615dbe&phone_no='.$mobile_no.'&sms_text='.$message.'&sms_language='.$language);
            $body = $api_response->getBody()->getContents();
            $response = $api_response ? $api_response->getBody() : 'N/A';
            // dump($body);
            $data = json_decode($body, true);
            // dd($data);
            if ($api_response->getStatusCode() == 200 && $data['status'] != 'error') {
                $sent = 1;
            }

            $api_response = json_encode($api_response);
        } catch (\Exception $e) {

            $api_response = 'Network Connection Error';
        }
        DB::table('sms_logs')->insert(
            ['cnic' => $cnic, 'mobile_no' => $mobile_no, 'message' => $message, 'is_delivered' => $sent, 'performed_action' => $action, 'api_response' => $response]);

    }
}
