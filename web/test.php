<?php
		function test(&$ar)
		{
			$formatted = implode(",", $ar);
			echo ($formatted);
			$ar[] = 1;
		}
		
		$skill = array(0);
		test($skill);
		echo "<br>";
		test($skill);
		echo "<br>";
		test($skill);
		
?>