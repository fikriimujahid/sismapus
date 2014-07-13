<?php
function getRandomImage($dir, $type='random')
{ 
global $errors,$seed; 
	if (is_dir($dir)) {  
		$fd = opendir($dir);  
		$images = array(); 
		
		while (($part = @readdir($fd)) == true) {  
			if ( preg_match("/(gif|jpg|png|jpeg)$/i",$part) ) {
				$images[] = $part; 
			} 
		} 

		if ($type == 'all') return $images;

		if ($seed !== true) {
			mt_srand ((double) microtime() * 100);
			$seed = true;
		}
    
		$key = mt_rand (0,sizeof($images)-1); 
	
		return $dir . $images[$key]; 
		
	} else { 
		$errors[] = $dir.' is not a directory'; 
		return false; 
	} 
} 
?>