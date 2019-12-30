<?php
require_once './http.php';
require_once './Mysql_connect.php';

$return_data = new NetworkData();

if(isGet()){
    $return_data->code = 10001;
    $return_data->message = "get";
    $return_data->data = null;
    return;
}
if(isPost()){
    $login_data = new Login_data();
    $login_account = $_POST["account"];
    $login_pass = $_POST["pass"];

    /*sql查询判断*/
    $mysql_sql = "SELECT statu FROM android_account WHERE account='string1' AND pass='string2'";
    $mysql_sql = str_replace("string1",$login_account,$mysql_sql);
    $mysql_sql = str_replace("string2",$login_pass,$mysql_sql);
    $mysql_result = $mysql_conn->query($mysql_sql);

    if ($mysql_result->num_rows > 0) {
        $row = $mysql_result->fetch_row();
        if($row[0]==1) {
            $login_data->account = $login_account;
            $login_data->pass =  $login_pass;
            $login_data->statu = $row[0];
        }
    } else {
        $login_data = null;
    }
    $mysql_conn->close();
    /*****/

    $return_data->data = $login_data;
    echo json_encode($return_data);
    return;
}

class Login_data {
    public $account;
    public $pass;
    public $statu;
}