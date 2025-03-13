<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use Tomkry\RecruitCiphers\Algo\BaconCipher;

class BaconCipherTest extends TestCase
{
    #[DataProvider('data')]
    public function testEncode($plain, $expected): void
    {
        $cipher = new BaconCipher();
        $output = $cipher->encrypt($plain);
        $this->assertEquals($expected, $output);
    }

    #[DataProvider('data')]
    public function testDecode($expected, $encrypted): void
    {
        // $this->markTestSkipped('This test has not been implemented yet.');
        $cipher = new BaconCipher();
        $output = $cipher->decrypt($encrypted);
        $expected = str_replace(' ', '', $expected);
        $this->assertEquals($expected, $output);
    }

    static public function data()
    {
        return [
            ['ABC', 'aaaaa aaaab aaaba'],
            ['AB C', 'aaaaa aaaab aaaba'],
        ];
    }
}
