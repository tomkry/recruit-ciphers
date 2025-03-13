<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use Tomkry\RecruitCiphers\Algo\AtbashCipher;

class AtbashCipherTest extends TestCase
{
    #[DataProvider('data')]
    public function testEncode($plain, $expected): void
    {
        $cipher = new AtbashCipher();
        $output = $cipher->encrypt($plain);
        $this->assertEquals($expected, $output);
    }

    #[DataProvider('data')]
    public function testDecode($expected, $encrypted): void
    {
        $cipher = new AtbashCipher();
        $output = $cipher->decrypt($encrypted);
        $this->assertEquals($expected, $output);
    }

    static public function data()
    {
        return [
            ['ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'ZYXWVUTSRQPONMLKJIHGFEDCBA'],
            ['12345', '12345'],
            ['ź', 'ź'],
            ['', ''],
        ];
    }
}
