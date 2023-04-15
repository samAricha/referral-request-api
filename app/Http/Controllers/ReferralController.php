<?php

namespace App\Http\Controllers;

use App\utils\ReferralRequestService;
use Illuminate\Http\Request;

class ReferralController extends Controller
{

    public function sendReferralRequest(){
        $referralRequestService = new ReferralRequestService();
       return $referralRequestService->pushReferralRequest();

    }
}
