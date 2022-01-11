<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class Logger
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function log(string $input): void
    {
        $this->logger->info($input);

    }
}