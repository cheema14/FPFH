<?php

namespace App\Http\Controllers;

use App\Services\Pmd;

class PmdApiController extends Controller
{
    public function __construct(Pmd $pmd)
    {
        $this->pmdService = $pmd;

    }

    public function test_pmd()
    {
        $fetchedDataPmd = $this->pmdService->fetchData('3520275109493');
        // dd($fetchedDataPmd);
    }
}
