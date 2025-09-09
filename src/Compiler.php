<?php

namespace Fauzara\Zed\Pint;

use Fauzara\Zed\Pint\Contracts\ConfigInterface;
use Fauzara\Zed\Pint\Contracts\EnvironmentInterface;
use Fauzara\Zed\Pint\Contracts\ProcessInterface;
use Fauzara\Zed\Pint\Contracts\ValidatorInterface;
use Fauzara\Zed\Pint\Stream\Input;
use Fauzara\Zed\Pint\Stream\Output;
use Psr\Http\Message\StreamInterface;

final class Compiler
{
    public function __construct(
        protected StreamInterface $input,
        protected ConfigInterface $config,
        protected EnvironmentInterface $environment,
        protected ?ProcessInterface $process = null,
        protected ?ValidatorInterface $validator = null,
    ) {
    }

    public static function build(): self
    {
        $input = Input::capture();

        $config = Config::build($environment = Environment::build());

        return new self($input, $config, $environment);
    }

    public function emit(): void
    {
        Output::emit($this->get());
    }

    public function get(): StreamInterface
    {
        if ($this->validator()->validated() === false) {
            return $this->input();
        }

        return $this->process()->get() ?? $this->input();
    }

    public function process(): ProcessInterface
    {
        return $this->process ??= Process::build($this->input(), $this->config(), $this->environment());
    }

    public function validator(): ValidatorInterface
    {
        return $this->validator ??= Validator::build($this->config(), $this->environment());
    }

    protected function input(): StreamInterface
    {
        return $this->input;
    }

    protected function config(): ConfigInterface
    {
        return $this->config;
    }

    protected function environment(): EnvironmentInterface
    {
        return $this->environment;
    }
}
