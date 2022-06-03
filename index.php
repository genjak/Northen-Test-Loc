<?php

	define('FILE_INPUT_1',"input_1.txt");// source file 1
	define('FILE_INPUT_2',"input_2.txt");// source file 2
	define('FILE_OUTPUT_1',"output_1.txt");// destination file 1
	define('FILE_OUTPUT_2',"output_2.txt");// destination file 2

	function array_diff_to_file(&$array1, &$array2, $file_output_name){		
		$file_output=fopen($file_output_name, 'w+') or die("Not open ".$file_output_name);
		
		$array=array_diff($array1, $array2);
		foreach($array as $item) fwrite($file_output, $item.PHP_EOL);
		
		fclose($file_output);				
	}
	
	$array_file1=explode(PHP_EOL,file_get_contents(FILE_INPUT_1));
	$array_file2=explode(PHP_EOL,file_get_contents(FILE_INPUT_2));
	
	array_diff_to_file($array_file1, $array_file2, FILE_OUTPUT_1);
	array_diff_to_file($array_file2, $array_file1, FILE_OUTPUT_2);
		
?>