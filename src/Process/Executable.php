<?php

namespace Fauzara\Zed\Pint\Process;

use Fauzara\Zed\Pint\Filesystem\File;
use Fauzara\Zed\Pint\Filesystem\Path;

abstract class Executable
{
    public static function bin(): string
    {
        return Path::join('vendor', 'bin', 'pint');
    }

    public static function get(string $cwd): ?string
    {
        return File::find(static::bin(), $cwd);
    }
}
