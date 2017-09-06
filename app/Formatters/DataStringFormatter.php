<?php
namespace App\Formatters;

class DataStringFormatter
{
	/**
	 * Format given data as a string using delimiter.
	 *
	 * @param  array $data
	 * @param  string $delimiter
	 * @return string
	 */
	public function format(array $data, $delimiter = '|')
	{
		return implode($delimiter, $data);
	}
}