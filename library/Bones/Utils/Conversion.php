<?php
class Bones_Utils_Conversion {

	/**
	 * Convert a binary expression (e.g., "100111") into a binary-string
	 * Enter description here ...
	 * @param unknown_type $input
	 */
	public static function bin2bstr($input)
	{
	  if (!is_string($input)) return null; // Sanity check
	
	  // Pack into a string
	  return pack('H*', base_convert($input, 2, 16));
	}



}