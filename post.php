<?php
/**
 * Created by PhpStorm.
 * User: Ruzi
 * Date: 2015/8/18
 * Time: 21:12
 */

session_start();
include "config.php";
if(!isset($_SESSION["user"])){
    echo "<script>window.location='index.php';</script>";
}else{


    if($_POST["post"]) {
        $data = $_POST["data"];
        $uname=$_SESSION["user"];
        @mysql_connect($db_host,$db_username,$db_password) or die("unable to connect database");
        @mysql_select_db($db_dbname) or die("data base not found");
        mysql_query("set names utf8");
        date_default_timezone_set("Asia/Urumqi");
        $date=date("y-m-d H:i:s");

        $sql_id="select * from users where username='$uname'";
        $id_rs=@mysql_query($sql_id);
        $id_ar=@mysql_fetch_array($id_rs);
        $id=$id_ar["id"];
        $sql1 = "INSERT INTO worklog (log_content,username,date,userid) VALUES ('$data', '$uname', '$date','$id')";

        $rs = mysql_query($sql1);


        if($rs){
            $dt=array("success"=>true,"message"=>"entry log success");
            echo json_encode($dt);
        }else{
            $dt=array("success"=>false,"message"=>"entry log failed");
            echo json_encode($dt);
        }

    }




}