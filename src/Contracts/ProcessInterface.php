<?php

namespace Fauzara\Zed\Pint\Contracts;

use Psr\Http\Message\StreamInterface;

interface ProcessInterface
{
    public function get(): ?StreamInterface;
}
