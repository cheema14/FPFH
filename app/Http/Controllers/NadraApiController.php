<?php

namespace App\Http\Controllers;

use App\Services\Nadra;

class NadraApiController extends Controller
{
    public function __construct(Nadra $nadra)
    {
        $this->nadraService = $nadra;

    }

    public function test_nadra()
    {
        $fetchedDataNadra = $this->nadraService->fetchData('3520275109493');
        dd($fetchedDataNadra);
        $rejectionCases = [
            'cnic_invalid' => [
                'condition' => isset($fetchedDataNadra['cnicValidity']) && $fetchedDataNadra['cnicValidity'] != 'yes',
                'status' => 3,
                'reason' => 'CNIC Not found.',
                'sms_template' => '',
            ],
            'province_invalid' => [
                'condition' => isset($fetchedDataNadra['provinceCheckValidity']) && $fetchedDataNadra['provinceCheckValidity'] != 'yes',
                'status' => 4,
                'reason' => 'CNIC not Belongs to Punjab.',
                'sms_template' => '',
            ],
        ];

        $apiErrorCase = [
            'condition' => isset($fetchedDataNadra) && in_array($fetchedDataNadra['code'], [301, 302, 303, 304, 500]),
            'status' => 3,
            'reason' => 'CNIC Not found.',
            'sms_template' => '',
            'source' => 3,
        ];

        $handleRejection = function ($case) use ($source) {
            $rejection_status = $case['status'];
            $rejection_reason = $case['reason'];
            $source = $case['source'] ?? $source;

            // $this->rejectApplication($request->cnic, $land_size, $rejection_status, $rejection_reason, $source);
            // $request->status_code = 3;

        };

        if (isset($fetchedDataNadra)) {
            if ($fetchedDataNadra['code'] == 200) {
                // Check rejection cases
                foreach ($rejectionCases as $case) {
                    if ($case['condition']) {
                        $handleRejection($case);

                        dd($handleRejection[$case]);
                    }
                }

                // If no rejections, handle success case
                // $request->status_code = 2;
                echo 'No rejection - its success';
                dd($fetchedDataNadra);

            } elseif ($apiErrorCase['condition']) {
                $handleRejection($apiErrorCase);
                echo 'API rejection';
                dd($fetchedDataNadra);

            } else {
                echo 'API code not 200';
                dd($fetchedDataNadra);

            }
        } else {
            echo 'Not set isset false if';
            dd($fetchedDataNadra);
        }
    }
}
