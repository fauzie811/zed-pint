<?php

namespace Fauzara\Zed\Pint\Contracts;

interface ConfigInterface
{
    public function file(): ?string;

    /**
     * @return array<int, string>
     */
    public function excluded(): array;
}
