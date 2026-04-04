<?php

namespace App\Services\ZipCode\ViaCep;

use App\Services\ZipCode\ZipCode;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;
use Throwable;

class ViaCep extends ZipCode
{
    /**
     * @throws Throwable
     */
    public function handle(): PromiseInterface|Response
    {
        $viaCepUrl = Str::of($this->url)->replace('{zip_code}', $this->zipCode);

        $this->setResponse($this->http()->get($viaCepUrl));

        $this->validateResponse();

        return $this->getResponse();
    }
}
