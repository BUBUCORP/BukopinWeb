<?php
function parseDateTime($date){
/*
param : yyyy-mm-dd hh:ii:ss
*/

	$int = preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/",$date,$match);
	if (!$int) return false;
	$data['year']	= $match[1];
	$data['month']	= $match[2];
	$data['day']	= $match[3];
	$data['hour']	= $match[4];
	$data['minute']	= $match[5];
	$data['second']	= $match[6];
	$data['day_of_week'] = date("N",mktime(0,0,0,intval($data['month']),intval($data['day']),intval($data['year'])));
	$data['month_ind_name'] = getIndMonth(intval($data['month']));
	$data['day_ind_name'] = getIndDay($data['day_of_week']);
	return $data;
}
function parseDateTimeIndex($date){
/*
param : yyyy-mm-dd hh:ii:ss
*/

	$int = preg_match("/(\d{4})-(\d{2})-(\d{2})/",$date,$match);
	if (!$int) return false;
	$data['year']	= $match[1];
	$data['month']	= $match[2];
	$data['day']	= $match[3];
	$data['day_of_week'] = date("N",mktime(0,0,0,intval($data['month']),intval($data['day']),intval($data['year'])));
	$data['month_ind_name'] = getIndMonth(intval($data['month']));
	$data['day_ind_name'] = getIndDay($data['day_of_week']);
	return $data;
}
function getIndDay($int="1"){
	switch($int){
		case "7":
			$strDay = "Minggu";
		break;
		case "6":
			$strDay = "Sabtu";
		break;
		case "5":
			$strDay = "Jum'at";
		break;
		case "4":
			$strDay = "Kamis";
		break;
		case "3":
			$strDay = "Rabu";
		break;
		case "2":
			$strDay = "Selasa";
		break;
		case "1":
		default:
			$strDay = "Senin";
		break;
	}
	return $strDay;
}
function getIndMonth($int=1){
	$data[1] = "Januari";
	$data[2] = "Februari";
	$data[3] = "Maret";
	$data[4] = "April";
	$data[5] = "Mei";
	$data[6] = "Juni";
	$data[7] = "Juli";
	$data[8] = "Agustus";
	$data[9] = "September";
	$data[10] = "Oktober";
	$data[11] = "November";
	$data[12] = "Desember";
	$intint = intval($int);
	if ($intint <= 12 && $intint >= 1 )
		return $data[$intint];
	else
		return false;
}


function getNowTime() {
    $waktu    =  date( 'Y-m-d H:i:s', time());
    return   $waktu; 
}

function formatingNowTime(){
    $waktu    = getNowTime();
    return parseDateTime($waktu);
}
function getSimpleIndonesianDate($date=null) {
    
    $waktu    = (($date == null )) ? formatingNowTime() : parseDateTime($date); 
    
    return $waktu['day_ind_name'].", ". $waktu['day']."/".$waktu['month']."/".$waktu['year'];	   
}
function getSimpleIndonesianDate2($date=null) {
    
    $waktu    = (($date == null )) ? formatingNowTime() : parseDateTime($date); 
    
    return $waktu['day_ind_name'].", ". $waktu['day']." ".$waktu['month_ind_name']." ".$waktu['year'];	   
}
function getNowYear() {
    $waktu    =  date( 'Y', time());
    return   $waktu; 
}

//2009-07-10T11:53:50Z

function convertGMTdate($string_date, $plus_hour=7) {

    $tmp1    = explode("T", $string_date);
    $ymd    =  $tmp1[0];
    $tmp2    = explode("Z",$tmp1[1]);
    $hms     = $tmp2[0];
    //$string_date2    =$ymd." ".$hms; 
    
    $ymd2    = explode("-",$ymd);
    $y       = $ymd2[0];
    $Mo       = $ymd2[1];
    $d       = $ymd2[2];
    
    $hms2    = explode(":",$hms);
    $h       = $hms2[0];
    $m       = $hms2[1];
    $s       = $hms2[2];       
    
    //echo "string_date :".$string_date;
    
    $dateID	    = mktime($h+$plus_hour,$m,$s,$Mo,$d,$y);
  	
	$string_date2    = date('Y-m-d H:i:s',$dateID);
	$result    = parseDateTime($string_date2);	
    //echo "<pre>";
    //print_r($result);
    //echo "</pre>";	
	return $result;
}

function convert_date_to_path($string_date,$delimiter='') {
    //echo "string date".$string_date;
    $dateB		= explode(" ",trim($string_date));
	$ymd		= explode("-",$dateB[0]);
	$y			= $ymd[0];
	$m			= $ymd[1];
	$d			= $ymd[2];
	return $y.$delimiter.$m.$delimiter.$d;	
}

function IndonesianDateFull($date=null) {
    
    $waktu    = (($date == null )) ? formatingNowTime() : parseDateTime($date); 
    
    return $waktu['day_ind_name'].", ". $waktu['day']." ".getIndMonth($waktu['month'])." ".$waktu['year'].", ". $waktu['hour'].":". $waktu['minute']." WIB";
}

//////////////////////////////////////////////////////////////////////
//PARA: Date Should In YYYY-MM-DD Format
//RESULT FORMAT:
// '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
// '%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days
// '%m Month %d Day'                                            =>  3 Month 14 Day
// '%d Day %h Hours'                                            =>  14 Day 11 Hours
// '%d Day'                                                        =>  14 Days
// '%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
// '%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
// '%h Hours                                                    =>  11 Hours
// '%a Days                                                        =>  468 Days
//////////////////////////////////////////////////////////////////////
function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format($differenceFormat);
    
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}