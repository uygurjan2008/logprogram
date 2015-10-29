<?php
/**
 * Created by PhpStorm.
 * User: Ruzi
 * Date: 2015/8/18
 * Time: 23:25
 */

session_start();
include "config.php";
if(!isset($_SESSION["user"])){
    echo "<script>window.location='index.php';</script>";
}else {


    if (isset($_POST["get_log"])) {

        $uname = $_SESSION["user"];
        @mysql_connect($db_host, $db_username, $db_password) or die("unable to connect database");
        @mysql_select_db($db_dbname) or die("data base not found");
        mysql_query("set names utf8");



        $sql1 = "select * from worklog where username='$uname';";
        //echo $sql1;
        $rs = @mysql_query($sql1);
        if($rs) {
            //$rs_wl = mysql_fetch_array($rs);
            $d=array();
            while($rs_wl = mysql_fetch_array($rs)){
                $tmp_dt=array("id"=>$rs_wl["id"],"title"=>$rs_wl["date"]);
                $d[count($d)]=$tmp_dt;
            }
            $dt=array("success"=>true,"data"=>$d);
            echo json_encode($dt);
        }else{
            $dt=array("success"=>false,"data"=>"no data found");
            echo json_encode($dt);


        }



    }else if(isset($_POST["id"])){
        $log_id=$_POST["id"];
        $uname = $_SESSION["user"];
        @mysql_connect($db_host, $db_username, $db_password) or die("unable to connect database");
        @mysql_select_db($db_dbname) or die("data base not found");
        mysql_query("set names utf8");


        $sql1 = "select * from worklog where id='$log_id';";

        $rs = @mysql_query($sql1);
        if($rs) {
            $rs_wl = @mysql_fetch_array($rs);


            $d=array("id"=>$rs_wl["id"],"title"=>$rs_wl["date"],"content"=>$rs_wl["log_content"]);


            $dt=array("success"=>true,"data"=>$d);
            echo json_encode($dt);
        }else{
            $dt=array("success"=>false,"data"=>"no data found");
            echo json_encode($dt);


        }


    }else if(isset($_POST["search"])){


        $text=$_POST["text"];

        $uname = $_SESSION["user"];
        @mysql_connect($db_host, $db_username, $db_password) or die("unable to connect database");
        @mysql_select_db($db_dbname) or die("data base not found");
        mysql_query("set names utf8");


        $sql1 = "select * from worklog where date like '%$text%' and username='$uname' ;";
       // echo $sql1."  ";
        $rs = @mysql_query($sql1);
        if($rs) {

            $d=array();
            while($rs_wl = mysql_fetch_array($rs)){
                $tmp_dt=array("id"=>$rs_wl["id"],"title"=>$rs_wl["date"],"content"=>$rs_wl["log_content"]);
                $d[count($d)]=$tmp_dt;
            }

            //$d=array("id"=>$rs_wl["id"],"title"=>$rs_wl["date"],"content"=>$rs_wl["log_content"]);


            $dt=array("success"=>true,"data"=>$d);
            echo json_encode($dt);
        }else{
            $dt=array("success"=>false,"data"=>"no data found");
            echo json_encode($dt);


        }


    }
}