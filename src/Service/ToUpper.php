<?php

namespace App\Service;

use App\Service\Transform;

class ToUpper implements Transform
{
    public function transform(string $input): string
    {
        $words = explode(" ",$input);
        $capitalize = false;
        $new_words = [];
        foreach($words as $word) {
            $chars = str_split($word);
            $out = '';
            foreach($chars as $char) {
                if(!$capitalize) {
                    $out = $out.strtolower($char);
                    $capitalize = true;
                }
                else {
                    $out = $out.strtoupper($char);
                    $capitalize = false;
                }
            }
            $new_words[] = $out;
        }

        // return 'testing';

        return implode(' ',$new_words);

        

    }
}