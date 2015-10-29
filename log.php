<?php
/**
 * Created by PhpStorm.
 * User: Ruzi
 * Date: 2015/8/18
 * Time: 16:29
 */
session_start();
include "config.php";
if(!isset($_SESSION["user"])){
    echo "<script>window.location='index.php';</script>";
}else{
if(isset($_POST["logout"])){

    $flag=$_POST["logout"];
    if($flag){
        unset($_SESSION["user"]);
    }

}



    ?>

    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>log program</title>
        <link rel="stylesheet" href="lib/plugins/bootstrap/css/bootstrap.css" />

        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/js/log.js"></script>


    </head>
    <body>
    <div class="container-fluid">
        <div class="col-xs-12" style="height: 50px;">
            <div class="col-xs-3">
                <label for="">username:<?php echo $_SESSION["user"]; ?> <a class="logout">logout</a> </label>
                <input type="search" placeholder="search" class="glyphicon-search search"/>

            </div>
            <div class="col-xs-9">
                <font size="6">log program</font>
                </div>
        </div>
        <div class="col-xs-3 entries" style="height: 500px;overflow:auto;margin-top: 20px;">

        </div>
        <div class="col-xs-9">
        <form role="form">
            <div class="form-group">
                <label for="name">log content</label>
                <textarea class="form-control textarea" rows="10" style="font-size: 22px;font-family: 'alkatip tor'" ></textarea>

            </div>


        </form>
            <a class="btn btn-default col-xs-3 submit"  >submit</a>
         </div>
        <div class="col-xs-12">

        </div>





    </div>
    </body>
    </html>





<?php
}