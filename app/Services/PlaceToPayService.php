<?php


namespace App\Services;


use App\Order;
use App\Traits\ConsumesExternalServices;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceToPayService
{
    use ConsumesExternalServices;

    protected $baseUri;
    protected $login;
    protected $trankey;

    protected $placetopay;

    protected $converter;

    protected $base_currency;

    public function __construct(CurrencyConversionService $converter)
    {
        $this->baseUri = config('services.placetopay.base_uri');
        $this->login = config('services.placetopay.login');
        $this->trankey = config('services.placetopay.trankey');
        $this->base_currency = strtoupper(config('services.placetopay.base_currency'));

        $this->placetopay = new PlacetoPay([
            'login' => $this->login,
            'tranKey' => $this->trankey,
            'url' => $this->baseUri,
        ]);

        $this->converter = $converter;
    }

    //Este metodo es llamado por el trait dependiendo del servicio puede o no ser necesario crearlo
    public function resolveAuthorization(&$queryParams,&$formParams,&$headers)
    {
        $formParams['auth'] = [
            "login"=> $this->login,
            "seed"=> date('c'),
            "nonce" => $this->resolveAccesToken(),
            "tranKey"=> $this->trankey
        ];
    }

    //para la autenticacion basica de paypal solo es necesario codificar en base 64 user:secret
    public function resolveAccesToken()
    {
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        $nonceBase64 = base64_encode($nonce);
        return $nonceBase64;
    }

    public function createOrder($value, $currency){
        $reference = 'TEST_' . time();
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Pago de prueba',
                'amount' => [
                    'currency' => $currency,//strtoupper($this->base_currency),
                    'total' => $value//round($value * $this->resolverFactor($currency)),
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('approval'),// $reference,
            "cancelUrl" => route('cancelled'),
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'PlacetoPay Sandbox',
        ];

        return $this->makeRequest(
            'POST',
            '/api/session',
            [],
            $request,
            [],
            true);
    }

    public function capturePayment($approvalId){

    }

    public function handlePayment(Request $request){
        $request->validate([
            'customer_name' => 'required',
            'customer_mobile' => 'required',
        ]);

        $response = $this->createOrder($request->value,strtoupper('cop'));
        $status = $response['status']['status'];

        $order = new Order();
        $order->customer_name = $request->customer_name;
        $order->customer_email = Auth::user()->email;
        $order->customer_mobile = $request->customer_mobile;
        $order->status = $response['status']['status'];
        Auth::user()->orders()->save($order);
        $order->save();

        if ($status === 'OK') {
            return redirect($response['processUrl']);
        }
        else{
            return redirect()
                    ->route('home')
                    ->withErrors($response['status']['message']);
        }
    }

    public function handleApproval(){
        return redirect()->route('home')->withSuccess(['payment'=>"Todo bien"]);
    }

    public function resolverFactor($currency){
        return $this->converter->convertCurrency($currency,$this->base_currency);
    }
}
