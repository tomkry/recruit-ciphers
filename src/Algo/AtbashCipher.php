<?php

namespace Tomkry\RecruitCiphers\Algo;

use Tomkry\RecruitCiphers\CiphersContract;

/**
 * implementation of Atbash cipher
 * https://en.wikipedia.org/wiki/Atbash
 */
class AtbashCipher implements CiphersContract
{
    public function encrypt(string $input): string
    {
        $alphabet = range('A', 'Z');
        $reversedAlphabet = array_reverse($alphabet);
        $output = '';

        $chars = str_split($input);
        foreach ($chars as $char) {
            if (preg_match('/[a-z]/i', $char)) {
                $char = strtoupper($char);
                $index = array_search($char, $alphabet);
                $output .= $reversedAlphabet[$index];
            } else {
                $output .= $char;
            }
        }

        return $output;
    }
    public  function decrypt(string $input): string
    {
        return $this->encrypt($input);
    }
}
