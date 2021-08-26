<?php

namespace App\Http\Controllers;

use App\Services\Payment\PaymentService;
use App\Services\UserPlan\UserPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function createPayment(Request $request, UserPlanService $userPlanService, PaymentService $paymentService)
    {
        $user = Auth::user();

        $userPlan = $userPlanService->userPlanWithoutPayment($user, $request->plan_id);
        if (!$userPlan) {
            $userPlan = $userPlanService->create([
                'user_id' => $user->id,
                'plan_id' => $request->plan_id
            ]);
        }
        // $payment = $paymentService->pay($user, $userPlan->plan);

        //Necessário criar usuário no mercado pago
        //
        dd($request->all(), $user, $userPlan->plan);
    }
}
