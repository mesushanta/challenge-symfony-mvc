<?php

namespace App\Service;

use App\Service\Transform;

class Master
{
    protected $transform;
    protected $logger;
    
    public function __construct(Transform $transform, Logger $logger)
    {
        $this->logger = $logger;
        $this->transform = $transform;
    }

    public function transform(string $input) {
       return $this->transform->transform($input);
    }

    public function log($input) {
        return $this->logger->log($input);
    }

    
}