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
