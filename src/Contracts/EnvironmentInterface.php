<?php

namespace Fauzara\Zed\Pint\Contracts;

interface EnvironmentInterface
{
    public function cwd(): string;

    public function file(): ?string;
}
