<?php


/* php下载保存本地 */
$file = 'D:\home\ftp\t\test2\800.cn.aijia798.com\ccc.mp3';
if (file_exists($file))
{
    if (FALSE!== ($handler = fopen($file, 'r')))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: chunked'); //changed to chunked
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file)); //Remove
    }
    exit;
}
echo "<h1>Content error</h1><p>The file does not exist!</p>";

	/* ---------------------远程调用保存------------------------------------------*/
	set_time_limit(0);
	$url = 'http://800.cn.aijia798.com/ccc.mp3';
	$file = basename($url);

	$tmp = explode(".",$file);
	if(is_array($tmp)){
		$suffix = $tmp[1];
		$file = time().".".$suffix;
	}

	$fp = fopen($file, 'w');
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	$data = curl_exec($ch);
	curl_close($ch);
	fclose($fp);
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	ob_clean();
	flush();
	readfile($file);
	exit;



?>