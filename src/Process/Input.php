<?php

namespace Fauzara\Zed\Pint\Process;

use Fauzara\Zed\Pint\Filesystem\File;
use Psr\Http\Message\StreamInterface;

abstract class Input
{
    public static function get(StreamInterface $input): ?string
    {
        $file = $input->getMetadata('uri');

        if (is_string($file) === false) {
            return null;
        }

        if (File::exists($file) === false) {
            return null;
        }

        return $file;
    }
}
