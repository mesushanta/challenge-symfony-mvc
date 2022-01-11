<?php

namespace App\Service;

use App\Service\Transform;

class ToDash implements Transform
{
    public function transform(string $input): string
    {
        return preg_replace('/\s+/', '_', $input);
    }
}