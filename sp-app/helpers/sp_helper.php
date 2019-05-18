<?php

// supangat helper 
// added 12 mey 2019

function tgl_bilang($t,$time=0,$am=0){
	$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$hasil=$hari[date("w",$t)].", ".date('j',$t)." ".substr($bulan[date("n",$t)], 0,3).". ".date("Y",$t);
	if ($time!=0) {
		$hasil.=date(" H:i",$t);
	}
	if ($am!=0) {
		$hasil.=date(" A",$t);
	}
	return $hasil;
}
function getChangelog($n=20){
	// Load Last 10 Git Logs
	$git_history = [];
	$git_logs = [];
	exec("git log -".$n, $git_logs);
	// Parse Logs
	$last_hash = null;
	foreach ($git_logs as $line)
	{
	    // Clean Line
	    $line = trim($line);
	    // Proceed If There Are Any Lines
	    if (!empty($line))
	    {
	        // Commit
	        if (strpos($line, 'commit') !== false)
	        {
	            $hash = explode(' ', $line);
	            $hash = trim(end($hash));
	            $git_history[$hash] = [
	                'message' => ''
	            ];
	            $last_hash = $hash;
	        }
	        // Author
	        else if (strpos($line, 'Author') !== false) {
	            $author = explode(':', $line);
	            $author = trim(end($author));
	            $git_history[$last_hash]['author'] = $author;
	        }
	        // Date
	        else if (strpos($line, 'Date') !== false) {
	            $date = explode(':', $line, 2);
	            $date = trim(end($date));
	            $git_history[$last_hash]['date'] = strtotime($date);
	        }
	        // Message
	        else {
	            $git_history[$last_hash]['message'] .= $line ." ";
	        }
	    }
	}
	return $git_history;
}