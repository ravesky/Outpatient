<?php
$mysql_servername = "localhost";
$mysql_username = "root";
$mysql_password = "123456";
$mysql_dbname = "android_schema";

// 创建连接
$mysql_conn = new mysqli($mysql_servername, $mysql_username, $mysql_password,$mysql_dbname);

// 检测连接
if ($mysql_conn->connect_error) {
    die("连接失败: " . $mysql_conn->connect_error);
}
$mysql_conn->query("set names utf8");