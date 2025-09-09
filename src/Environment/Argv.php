<?php

namespace Fauzara\Zed\Pint\Environment;

use Illuminate\Support\Arr;

abstract class Argv
{
    /**
     * @return string[]
     */
    public static function get(): array
    {
        return Arr::array($_SERVER, 'argv');
    }
}
