<?php

namespace Fauzara\Zed\Pint\Environment;

abstract class Cwd
{
    public static function get(): ?string
    {
        return getcwd() ?: null;
    }
}
