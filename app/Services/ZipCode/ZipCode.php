<?php

namespace App\Services\ZipCode;

use App\Services\ZipCode\Contracts\ZipCode as ZipCodeContract;
use App\Services\ZipCode\Exceptions\ZipCodeException;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class ZipCode implements ZipCodeContract
{
    public readonly string $zipCode;

    private PromiseInterface|Response $response;

    public function __construct(
        public readonly string $url,
    ) {}

    public function setZipCode(string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getResponse(): PromiseInterface|Response
    {
        return $this->response;
    }

    public function setResponse(PromiseInterface|Response $response): static
    {
        $this->response = $response;

        return $this;
    }

    protected function http(): PendingRequest
    {
        $http = Http::asJson()
            ->acceptJson();

        if (! app()->isProduction()) {
            $http->withoutVerifying();
        }

        return $http;
    }

    /**
     * {@inheritDoc}
     */
    public function validateResponse(): void
    {
        throw_if(
            $this->response->failed(),
            ZipCodeException::class,
            $this->response->json('message') ?? '',
            $this->response->status(),
        );
    }
}
