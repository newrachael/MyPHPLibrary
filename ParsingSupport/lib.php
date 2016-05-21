<?php
	/*
	 * This funtion from php.net 
	 * 
	 * How to use :
	 * 	getStrsBetween("<li>test</li>", "<li>" , "</li">);
	 * 
	 */
	function getStrsBetween($s,$s1,$s2=false,$offset=0) {
		/*====================================================================
		 Function to scan a string for items encapsulated within a pair of tags
	
		getStrsBetween(string, tag1, <tag2>, <offset>
	
				If no second tag is specified, then match between identical tags
	
				Returns an array indexed with the encapsulated text, which is in turn
				a sub-array, containing the position of each item.
	
				Notes:
				strpos($needle,$haystack,$offset)
				substr($string,$start,$length)
	
				====================================================================*/
	
		if( $s2 === false ) { $s2 = $s1; }
		$result = array();
		$L1 = strlen($s1);
		$L2 = strlen($s2);
	
		if( $L1==0 || $L2==0 ) {
			return false;
		}
	
		do {
			$pos1 = strpos($s,$s1,$offset);
			if( $pos1 !== false ) {
				$pos1 += $L1;
				$pos2 = strpos($s,$s2,$pos1);
	
				if( $pos2 !== false ) {
					$key_len = $pos2 - $pos1;
					$this_key = substr($s,$pos1,$key_len);
	
					if( !array_key_exists($this_key,$result) ) {
						$result[$this_key] = array();
					}
	
					$result[$this_key][] = $pos1;
					$offset = $pos2 + $L2;
				} else {
					$pos1 = false;
				}
			}
		} while($pos1 !== false );
	
		return $result;
	}
?>