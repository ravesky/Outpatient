<?php
	/*
	*允许所有域名访问
	*https://www.runoob.com/w3cnote/php-ajax-cross-border.html
	*/
	header('Access-Control-Allow-Origin:*');
	// 响应类型
	header("Access-Control-Allow-Methods: POST, OPTIONS, PUT, DELETE");
	// 响应头设置
	header('Access-Control-Allow-Headers:x-requested-with,content-type');

	//是否为get请求
	function isGet(){
		return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
		}
	//是否为post请求
	function isPost(){
		return isset($_SERVER['REQUEST_METHOD']) && !strcasecmp($_SERVER['REQUEST_METHOD'],'POST');
		}
	class NetworkData {
		public $code = 200;
		public $message = "ok";
		public $data;
	}
	/*
	//获取请求ip
	$ip=getenv('REMOTE_ADDR');
	class Emp {
       public $statu_code = "";
       public $message  = "";
	   public $ip = "";
	   public $emp;
    }
    $e = new Emp();
    $e->statu_code = 200;
    $e->message = "error";
	$e->ip = $ip;

	$e2 = new Emp();
	$e2->statu_code = 200;
    $e2->message = "error";
	$e2->ip = $ip;
	$e2->emp = $e;

	echo json_encode($e2);
?>