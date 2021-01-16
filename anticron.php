<?php
/*
@Version : 3.0
@Author : Nitish Kumar
*/
//cron =>  */10 * * * * php -q /root/anticron.php do > /dev/null 2>&1

@ob_start();
@error_reporting(0);

if ((PHP_SAPI == 'cli'))
{
foreach ($argv as $arg)
{
list($arg_x, $arg_y) = explode('=', $arg);
$_GET[$arg_x] = $arg_y;
}
}

function replc(){
return $replc='0 '.rand(1,12).' * * *';	
}	

$check = array_key_exists("check", $_GET);
$do = array_key_exists("do", $_GET);

//$chk=array('* * * * *','*/1 * * * *','*/2 * * * *','*/3 * * * *','*/4 * * * *','*/5 * * * *',);
$chk=array('* * * * *','*/1 * * * *','*/2 * * * *','*/3 * * * *','*/4 * * * *','*/5 * * * *','*/6 * * * *','*/7 * * * *','*/8 * * * *','*/9 * * * *','*/10 * * * *');


$c_dir="/var/spool/cron/";
$arr=array('.', '..','root','asxfwa4','kqh9sgp'); 

if($check === true)
{
$dir = opendir($c_dir);
$file = readdir($dir);
$i = 0;
while (false !== ($file = readdir($dir))) { 
if(!in_array($file,$arr))
{
$usr=@file_get_contents($c_dir .$file);
$x=explode("\n",$usr);

if((count($x)-1) > 1 && strlen($usr) > 20)
{
echo $file ." => \n";
foreach($x as $nx)
{
if(stristr($nx, 'MAILTO=') == false &&  stristr($nx, 'SHELL="') == false && strlen($nx) > 10)
{
$xx=explode(" ",$nx,6);
echo $xx[0].' '.$xx[1].' '.$xx[2].' '.$xx[3].' '.$xx[4]."\r\n";
}
}
echo "-------------------------------------------------------\n";
}
}
}     
}


if($do === true)
{
$dir = opendir($c_dir);
$file = readdir($dir);
$i = 0;	
while (false !== ($file = readdir($dir))) { 
if(!in_array($file,$arr))
{	
foreach($chk as $ck){
$usr=@file_get_contents($c_dir .$file);
if(stristr($usr,$ck) == true){
$replc=replc();
$cron_n=str_replace($ck,$replc,$usr);
@file_put_contents($c_dir.$file,$cron_n);
}
unset($usr);
}
}	
}
}
