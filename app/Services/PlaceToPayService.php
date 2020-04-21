<?php


namespace App\Services;


use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;

class PlaceToPayService
{
    use ConsumesExternalServices;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.placetopay.base_uri');
    }

    //Este metodo es llamado por el trait dependiendo del servicio puede o no ser necesario crearlo
    public function resolveAuthorization(&$queryParams,&$formParams,&$headers)
    {

    }

    //para la autenticacion basica de paypal solo es necesario codificar en base 64 user:secret
    public function resolveAccesToken()
    {

    }

    public function createOrder($value, $currency){

    }

    public function capturePayment($approvalId){

    }

    public function handlePayment(Request $request){

    }

    public function handleApproval(){

    }

    public function resolverFactor($currency){

    }
}
