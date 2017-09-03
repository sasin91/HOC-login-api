<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Custom  Salt
	|--------------------------------------------------------------------------
	|
	| Hashids supports personalizing your hashes by accepting a salt value.
	| If you don't want others to decrypt your hashes, provide a unique
	| string used for salting.
	|
	*/

	'salt' => 'Av2eqQbPDgKuJx0WapmA6nJP5VZVOqcr',

	/*
	|--------------------------------------------------------------------------
	| Hash Length
	|--------------------------------------------------------------------------
	|
	| By default, hashes are going to be the shortest possible. You can also
	| set the minimum hash length to obfuscate how large the number behind
	| the hash is.
	|
	*/

	'length' => 4,

	/*
	|--------------------------------------------------------------------------
	| Custom alphabet
	|--------------------------------------------------------------------------
	|
	| The default alphabet contains all lowercase and uppercase letters
	| and numbers. If you'd like to make it longer, you can add more
	| characters like - @ $ % ^ & * ( ) [ ] { }
	|
	| default: 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
	*/

	'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',

];
