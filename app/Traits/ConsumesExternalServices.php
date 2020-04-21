<?php


namespace App\Traits;


use Illuminate\Support\Facades\Http;

trait ConsumesExternalServices
{
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $isJsonRequest = false)
    {
        //revisa si existe el metodo, si existe lo usa si no pos no :v
        if(method_exists($this, 'resolveAuthorization'))
        {
            $this->resolveAuthorization($queryParams,$formParams,$headers);
        }

        $response = Http::send($method,$this->baseUri.$requestUrl,[
            $isJsonRequest? 'json': 'form_params' => $formParams,
            'headers' => $headers,
            'query' => $queryParams,
        ]);

        return $response->json();
    }
}
