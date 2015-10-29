<?php
/**
 * Created by PhpStorm.
 * User: Ruzi
 * Date: 2015/8/18
 * Time: 17:44
 */
include "config.php";
if(isset($_POST["operation"])){

    $op=$_POST["operation"];
    if($op=="usercheck"){
        session_start();
        $uname=$_POST["username"];
        $upass=$_POST["userpass"];
        @mysql_connect($db_host,$db_username,$db_password) or die("unable to connect database");
        @mysql_select_db($db_dbname) or die("data base not found");
        mysql_query("set names utf8");
        $sql1="select username from users where username='$uname'";
        $rs=@mysql_query($sql1);
        $rsr=@mysql_fetch_array($rs);


        if(count($rsr["username"])!=0){
            $upass1=md5($upass);
            $s_sql="select username,password from users where username='$uname' and password='$upass1'";
            $rs2=mysql_query($s_sql);
            if($rs2){
                $rs22=@mysql_fetch_array($rs2);
                $_SESSION["user"]=$rs22["username"];

                $dt=array("success"=>true,"message"=>"login successfull","session"=>$_SESSION["user"]);
                echo json_encode($dt);

            }else{

                $dt=array("success"=>false,"message"=>"user password incorrect");
                echo json_encode($dt);

            }
        }else{
            $dt=array("success"=>false,"message"=>"user not found");
            echo json_encode($dt);
        }





    }else  if($op=="signup"){



        $uname=$_POST["username"];
        $upass=$_POST["userpass"];
        @mysql_connect($db_host,$db_username,$db_password) or die("unable to connect database");
        @mysql_select_db($db_dbname) or die("data base not found");
        @mysql_query("set names utf8");
        $sql1="select username from users where username='$uname'";
        $rs=@mysql_query($sql1);
        $rsr=@mysql_fetch_array($rs);


        if(count($rsr["username"])==0){
            $upass1=md5($upass);
            $sql="INSERT INTO users (username, password) VALUES ('$uname','$upass1');";

          // echo "sql:::".$sql."   ";

            $rs2=@mysql_query($sql);
            if($rs2){

                 $dt=array("success"=>true,"message"=>"sign up successfull","username"=>$uname);
                echo json_encode($dt);

            }else{

                $dt=array("success"=>false,"message"=>"sign up failed","username"=>$uname);
                echo json_encode($dt);

            }
        }else{
            $dt=array("success"=>false,"message"=>"user exists,pick another name","username"=>$uname,"sql2"=>$sql1);
            echo json_encode($dt);
        }




    }


}else{



}