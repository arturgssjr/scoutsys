<?php

namespace App\Services\ZipCode\Contracts;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Throwable;

interface ZipCode
{
    public function handle(): PromiseInterface|Response;

    /**
     * @throws Throwable
     */
    public function validateResponse(): void;
}
