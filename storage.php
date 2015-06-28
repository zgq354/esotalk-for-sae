<?php
//选择文件输出头
function file_header($a){
switch($a){
case 'txt':
return 'Content-Type: text/plain';
break;
    
case 'css':
return 'Content-Type: text/css';
break;
    
case 'js':
return 'Content-Type: application/javascript';
break;

case 'rar':
case 'zip':
case '7z':
return 'Content-Type: application/octet-stream';
break;

case 'mp3':
return 'Content-type: audio/mp3';
break;

case 'wav':
return 'Content-type: audio/wav';
break;

case 'png':
return 'Content-type: image/png';
break;

case 'gif':
return 'Content-type: image/gif';
break;

case 'jpg':
return 'Content-type: image/jpeg';
break;

default:
return 'Content-Type: application/octet-stream';
}
}

$domain = $_GET['d'];
$file = $_GET['f'];

$maxage = 604800;

if($domain != 'USE_KVDB'){
	$s = new SaeStorage();
	if($s->fileExists($domain,$file)){
		//获取文件后缀名
		$info = pathinfo($file);
		//如果后缀获取失败则默认为jpg
		if(empty($info['extension'])) $info['extension'] = 'jpg';
		//输出文件头
		$header = file_header($info['extension']);
		header("{$header}");
		//cache
		header("Cache-Control:public,max-age=$maxage");
        ob_start('ob_gzhandler');
		echo $s->read($domain,$file) ;
	}else{
		header("HTTP/1.1 404 Not Found");
		//exit();
	}
}else{
    //use KVDB
    //去除第一个"/"
	//echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']."\n";
    //var_dump($file);exit();
    $file = substr($file,1,(strlen($file)-1));
    if(file_exists('saekv://'.$file))
	{
		//获取文件后缀名
		$info = pathinfo($file);
		//如果后缀获取失败则默认为jpg
		if(empty($info['extension'])) $info['extension'] = 'jpg';
		//输出文件头
		$header = file_header($info['extension']);
		header("{$header}");
		//cache
		header("Cache-Control:public,max-age=$maxage");
        //echo $f;
        ob_start('ob_gzhandler');
        echo file_get_contents('saekv://'.$file);
	}
	else
	{
		header("HTTP/1.1 404 Not Found");
		//exit();
	}
}