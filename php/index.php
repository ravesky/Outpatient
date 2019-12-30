 <?php
	require_once './http.php';
	require_once './Mysql_connect.php';
	if(isGet()){
		echo "get请求";
		return;
	}
	if(isPost()){
        $login_account = $_POST["account"];
        $login_pass = $_POST["pass"];
		$return_data = new NetworkData();
		$login_data = new Login_data();
		$id=1;
		/******/
        $mysql_sql = "SELECT account, pass FROM android_account WHERE id=".$id;
        $mysql_result = $mysql_conn->query($mysql_sql);

        if ($mysql_result->num_rows > 0) {
            // 输出数据
            $row = $mysql_result->fetch_row();
            $login_data->account = $row[0];
            $login_data->pass = $row[1];
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
     }
 ?>