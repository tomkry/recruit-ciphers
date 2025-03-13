<?php

namespace Tomkry\RecruitCiphers\Algo;

use Tomkry\RecruitCiphers\CiphersContract;

/**
 * implementation of Caesar cipher
 * https://en.wikipedia.org/wiki/Caesar_cipher
 */
class CaesarCipher implements CiphersContract
{
    const SHIFT = 3;
    public function encrypt(string $input): string
    {
        $offset = ord('A');
        $chars = str_split($input);
        $output = "";
        foreach ($chars as $char) {
            $newChar = $char;
            if (preg_match("/[a-z]/i", $char)) {
                $newChar = ord(strtoupper($char)) - $offset + 26 + self::SHIFT;
                $newChar = chr($newChar % 26 + $offset);
            } elseif (" " === $char) {
                $newChar = $char;
            } else {
                trigger_error('Character outside range /[a-z]/i', E_USER_WARNING);
                $newChar = $char;
            }
            $output .= $newChar;
        }
        return $output;
    }

    public function decrypt(string $input): string
    {
        $offset = ord('A');
        $chars = str_split($input);
        $output = "";
        foreach ($chars as $char) {
            $newChar = $char;
            if (preg_match("/[a-z]/i", $char)) {
                $newChar = ord(strtoupper($char)) - $offset + 26 - self::SHIFT;
                $newChar = chr($newChar % 26 + $offset);
            } elseif (" " === $char) {
                $newChar = $char;
            } else {
                trigger_error('Character is outside range /[a-z]/i', E_USER_WARNING);
                $newChar = $char;
            }
            $output .= $newChar;
        }
        return $output;
    }
}
