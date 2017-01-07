<?php
/**
 *
 * 芒果TV - 看见好时光 - 视频获取
 *
 * @author     loenwolf <http://themesfield.com.cn>
 * @date       2016-08-31 19:31:28
 * @version    1.6
 *
 * 严重警告：
 * 1、源码仅供学习交流使用。
 * 2、禁止用于危害官方利益的行为。
 * 3、禁止用于违反法律法规的行为。
 *
 *
 *
 */
error_reporting(0);
header('Content-type: text/json;charset=utf-8');

$ui = array();
foreach($_GET as $key => $value){
    $ui[$key] = trim($value);
}

if( empty($ui['id']) || !is_numeric($ui['id'])){
    die('Please attach relevant parameters!');
}

function http_curl($url){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $response=curl_exec($curl);
    curl_close($curl);
    return $response;
}

function M3u8ToMp4($url){
	
	$s = explode('&',$url);
	$f = explode('&file=',$url);
	$x = explode('/',$f[1]);
	$i = substr($x[5],0,-4);
	$d = substr($x[5],-4);
	
	if( $d='_mp4' ){
		$mp4 = '.mp4';
	}else{
		$mp4 = '.mp4';
	}
	
	return $s[0].'&pno=1031&'.$s[2].'&limitrate=0&file=/'.$x[1].'/'.$x[2].'/'.$x[3].'/'.$x[4].'/'.$i.$mp4;
	
}

function SD($url){
	$response = json_decode(http_curl($url),true);
	return $response['info'];
}

function HD($url){
	$response = json_decode(http_curl($url),true);
	return $response['info'];
}

function UHD($url){
	$response = json_decode(http_curl($url),true);
	return $response['info'];
}

function unescape($j){
	$k="";
	$l=0;
	$m=strlen($j);
	while($l<$m){
		$n=substr($j,$l,1);
		if($n=='%'){
			$l++;
			$n=substr($j,$l,1);
			if($n=='u'){
				$l++;
				$o=substr($j,$l,4);
				$p=hexdec($o);
				$q="&#".$p.';';
				$k.=utf8_encode($q);
				$l+=4;
			}else{
				$r=substr($j,$l,2);
				$k.=chr(hexdec($r));
				$l+=2;
			}
		}else{
			$k.=$n;
			$l++;
		}
	}
	return $k;
}

$m = json_decode(http_curl("http://v.api.mgtv.com/player/video?video_id=".$ui['id']),true);

$data = array(
	'info' => array(
		'category' => $m['data']['info']['root_name'],
		'category_name' => $m['data']['info']['collection_name'],
		'title' => $m['data']['info']['title'],
		'sub_title' => $m['data']['info']['sub_title'],
		'series' => $m['data']['info']['series'],
		'url' => $m['data']['info']['url'],
		'thumb' => $m['data']['info']['thumb'],
		'desc' => $m['data']['info']['desc'],
		'icon' => $m['data']['info']['icon'] ? 'vip' : null,
	),
	'video' => array(
		'mp4' => array(
			'SD' => SD(M3u8ToMp4(unescape($m['data']['stream'][0]['url']))),
			'HD' => HD(M3u8ToMp4(unescape($m['data']['stream'][1]['url']))),
			'UHD' => UHD(M3u8ToMp4(unescape($m['data']['stream'][2]['url'])))
		),
		'm3u8' => array(
			'SD' => SD(unescape($m['data']['stream'][0]['url'])),
			'HD' => HD(unescape($m['data']['stream'][1]['url'])),
			'UHD' => UHD(unescape($m['data']['stream'][2]['url']))
		)
	),
	'frame_image' => $m['data']['frame']['images'],
	'next' => $m['data']['next']
);

if ( $m['data'] ){
    $printr = array('status' => '200', 'msg' => 'success', 'data' => $data);
} else {
    $printr = array('status' => '0', 'msg' => 'ㄟ( ▔, ▔ )ㄏ，参数错误');
}
print_r(json_encode($printr));
exit;
?>