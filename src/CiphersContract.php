<?php
interface CiphersContract{
	public function encrypt(string $input):string;
	public function decrypt(string $input):string;
}