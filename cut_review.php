	<?php	function send_string_review($text)
		{
		$teaser = $text;
        if(mb_strlen($text) > 360) {
		$text=str_replace(".",",",$text);
    //this finds the position of the first period after 360 characters
    $period = strpos($text, '.', 360);
    //this finds the position of the first space after 360 characters
    //we can use this for a clean break if a '.' isn't found.
    $space = strpos($text, ' ', 360);

    if($period !== false) {
        //this gets the characters 0 to the period and stores it in $teaser
        $teaser = substr($text, 0, $period);
    } elseif($space !== false) {
        //this gets the characters 0 to the next space
        $teaser = substr($text, 0, $space);
    } else {
        //and if all else fails, just break it poorly
        $teaser = substr($text, 0, 360);
    }
	 $teaser.='...';
}	
  
    return $teaser;
		}
		?>