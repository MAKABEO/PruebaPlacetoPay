<?php


namespace App\Services;


use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;

class CurrencyConversionService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $apiKey;

    public function __construct()
    {
        //llamamos la informacion desde los servicios puestos en la configuracion services (config/services)
        $this->baseUri = config('services.currency_conversion.base_uri');
        $this->apiKey = config('services.currency_conversion.api_key');
    }

    //Este metodo es llamado por el trait dependiendo del servicio puede o no ser necesario crearlo
    public function resolveAuthorization(&$queryParams,&$formParams,&$headers)
    {
        $queryParams['apiKey'] = $this->resolveAccesToken();
    }

    //para la autenticacion basica de paypal solo es necesario codificar en base 64 user:secret
    public function resolveAccesToken()
    {
        return $this->apiKey;
    }

    public function convertCurrency($from, $to){
        $response = $this->makeRequest(
            'GET',
            '/api/v7/convert',
            [
                'q' => "{$from}_{$to}",
                'compact' => 'ultra'
            ],
            []
        );
        return $response[strtoupper("{$from}_{$to}")];
    }
}
