<?php

namespace App\Http\Controllers;

use App\Resolvers\PaymentPlatformResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;

    /**
     * Create a new controller instance.
     *
     * @param PaymentPlatformResolver $paymentPlatformResolver
     */
    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('auth');
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required','numeric','min:5'],
            'payment_platform' => ['required','exists:payment_platforms,id'],
        ];

        $request->validate($rules);

        $paymentPlatform = $this->paymentPlatformResolver->resolvePlatform($request->payment_platform);

        session()->put('paymentPlatformId', $request->payment_platform);

        return $paymentPlatform->handlePayment($request);
    }

    public function approval()
    {
        if (session()->has('paymentPlatformId'))
        {
            $paymentPlatform = $this->paymentPlatformResolver->resolvePlatform(session()->get('paymentPlatformId'));
            return $paymentPlatform->handleApproval();
        }
        return redirect()->route('home')->withErrors('No se puede obtener la plataforma');
    }

    public function cancelled()
    {
        return redirect()->route('home')->withErrors('Cancelo');
    }
}
