<?php

namespace Tomkry\RecruitCiphers\Algo;

use Tomkry\RecruitCiphers\CiphersContract;

/**
 * implementation of Bacon cipher
 * https://en.wikipedia.org/wiki/Bacon%27s_cipher
 */
class BaconCipher implements CiphersContract
{
    const SUBSTITUTIONS = [
        'A'  => 'aaaaa',
        'B'  => 'aaaab',
        'C'  => 'aaaba',
        'D'  => 'aaabb',
        'E'  => 'aabaa',
        'F'  => 'aabab',
        'G'  => 'aabba',
        'H'  => 'aabbb',
        'I'  => 'abaaa',
        'J'  => 'abaaa',
        'K'  => 'abaab',
        'L'  => 'ababa',
        'M'  => 'ababb',
        'N'  => 'abbaa',
        'O'  => 'abbab',
        'P'  => 'abbba',
        'Q'  => 'abbbb',
        'R'  => 'baaaa',
        'S'  => 'baaab',
        'T'  => 'baaba',
        'U'  => 'baabb',
        'V'  => 'baabb',
        'W'  => 'babaa',
        'X'  => 'babab',
        'Y'  => 'babba',
        'Z'  => 'babbb',
    ];

    public function encrypt(string $input): string
    {
        $output = '';
        $chars = str_split($input);
        foreach ($chars as $char) {
            if (preg_match('/[a-z]/i', $char)) {
                $upperChar = strtoupper($char);
                $output .= self::SUBSTITUTIONS[$upperChar] . " ";
            } elseif (' ' === $char) {
            } else {
                trigger_error('Character is outside range /[a-z]/i', E_USER_WARNING);
                $output .= $char;
            }
        }

        return trim($output);
    }
    public function decrypt(string $input): string
    {
        $substitution = array_flip(self::SUBSTITUTIONS);
        $output = '';
        $inputClean = preg_replace('/[^a-z]/i', '', $input);
        // get portion of 5 chars (a,b) string to encrypt
        /* */
        while ($inputClean) {
            $part5 = substr($inputClean, 0, 5);
            $inputClean = substr_replace($inputClean, '', 0, 5);
            $output .= $substitution[strtolower($part5)];
        }
        /* */
        return $output;
    }
}
