<?php


namespace App\Resolvers;


use App\PaymentPlatform;

class PaymentPlatformResolver
{
    protected $paymentPlatforms;

    public function __construct()
    {
        $this->paymentPlatforms = PaymentPlatform::all();
    }

    public function resolvePlatform($paymentPlatformId)
    {
        $name = strtolower($this->paymentPlatforms->firstWhere('id',$paymentPlatformId)->name);
        $service = config("services.{$name}.class");

        if($service){
            return resolve($service);
        }

        throw new \Exception("La plataforma seleccionada no esta configurada");
    }
}
