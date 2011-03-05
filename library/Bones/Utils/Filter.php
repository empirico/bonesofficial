<?php
class Bones_Utils_Filter {


	public static function slug_me($value) {
        // Lowercase the string
        $value = strtolower($value);
 
        // Generate slug by removing unwanted (other than alphanumeric and dash [-]) characters from the string
        $value = preg_replace('/[^a-z0-9-]/i', '-', $value);
        $value = preg_replace('/-[-]*/', '-', $value);
        $value = preg_replace('/-$/', '', $value);
        $value = preg_replace('/^-/', '', $value);
        
        return $value;
     }
     
     public static function clean_filename($value) {
     
     	$value = strtolower($value);
     	$value = preg_replace('/[^a-z0-9-\.]/i', '-', $value);
     	$value = preg_replace('/-[-]*/', '-', $value);
        $value = preg_replace('/-$/', '', $value);
        $value = preg_replace('/^-/', '', $value);
     	return $value;
     
     }

}