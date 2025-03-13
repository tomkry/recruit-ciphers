<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use Tomkry\RecruitCiphers\Algo\CaesarCipher;

class CaesarCipherTest extends TestCase
{
    #[DataProvider('data')]
    public function testEncode($plain, $expected): void
    {
        $cipher = new CaesarCipher();
        $output = $cipher->encrypt($plain);
        $this->assertEquals($expected, $output);
    }

    #[DataProvider('data')]
    public function testDecode($expected, $encrypted): void
    {
        $cipher = new CaesarCipher();
        $output = $cipher->decrypt($encrypted);
        $this->assertEquals($expected, $output);
    }

    static public function data()
    {
        return [
            ['ABC', 'DEF'],
            ['AB C', 'DE F'],
            ['ABCD EFGHIJKLMNOPQRST UVWXYZ', 'DEFG HIJKLMNOPQRSTUVW XYZABC'],
            ['ABCD EFGHIJKLMNOPQRST UVWXYZ', 'DEFG HIJKLMNOPQRSTUVW XYZABC'],
        ];
    }
}
