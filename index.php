<?php
/**
 * Created by PhpStorm.
 * User: Ruzi
 * Date: 2015/8/18
 * Time: 15:48
 */

if(!file_exists("config.php")){


    $db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_dbname="worklog";

    $rs=@mysql_connect($db_host,$db_username,$db_password);


    if($rs) {



            $sq="CREATE DATABASE IF NOT EXISTS $db_dbname DEFAULT CHARSET utf8 COLLATE utf8_general_ci;";

            mysql_query($sq);

            mysql_select_db($db_dbname);

            $sql = file_get_contents("worklog.sql"); //把SQL语句以字符串读入$sql

            $a = explode(";", $sql); //用explode()函数把‍$sql字符串以“;”分割为数组

            foreach ($a as $b) { //遍历数组
                $c = $b . ";"; //分割后是没有“;”的，因为SQL语句以“;”结束，所以在执行SQL前把它加上

                mysql_query($c); //执行SQL语句
            }






        $dt = "<?php \n \$db_host=\"" . $db_host . "\"; \n \$db_username=\"" . $db_username . "\"; \n \$db_password=\"" . $db_password . "\"; \n \$db_dbname=\"" . $db_dbname . "\";";

        $myfile = fopen("config.php", "w") or die("Unable to open file!");

        fwrite($myfile, $dt);



    }else{

        echo "database connect failed";

    }

}else {







    session_start();
  if (isset($_SESSION["user"])) {
        echo "<script>window.location='log.php';</script>";
    } else {

        ?>
        <html>
        <head lang="en">
            <meta charset="UTF-8">
            <title>log program</title>
            <link rel="stylesheet" href="lib/plugins/bootstrap/css/bootstrap.css"/>

            <script src="lib/js/jquery.min.js"></script>
            <script src="lib/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                $(function () {

                    $(".login").click(function () {
                        var uname = $("input[name='username']").val();
                        var upass = $("input[name='password']").val();
                        if (uname.length > 0) {

                            if (upass.length > 0) {


                                $.ajax({
                                    url: "check.php",
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        username: uname,
                                        userpass: upass,
                                        operation: "usercheck"
                                    },
                                    success: function (e) {
                                       // console.log(e);
                                        if (e.success) {
                                            window.location.href = "log.php";
                                        } else {
                                            alert(e.message);
                                        }
                                    }
                                });
                            } else {
                                alert("password is void");
                            }
                        } else {
                            alert("username is void");
                        }

                    });


                    $(".clear").click(function(){
                       $("input[name='username']").val("");
                       $("input[name='password']").val("");
                    });

                })

            </script>


        </head>
        <body>
        <div class="container-fluid">




        <div class="col-xs-12">
            <div class="col-xs-12" style="height: 200px;"></div>
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
                <div class="col-xs-12" style="line-height: 30px;margin-bottom: 5px;">
                    <label class="col-xs-5" for="" style="width: 120px;">username</label>
                    <input class="col-xs-7" type="text" name="username"/></div>
                <div class="col-xs-12" style="line-height: 30px;margin-bottom: 5px;">
                    <label class="col-xs-5" for="" style="width: 120px;">password</label>
                    <input class="col-xs-7" type="password" name="password"/></div>

                <div class="col-xs-12">

                    <a class="col-xs-5 btn btn-default login" style="width: 120px;">login</a>
                    <a class="col-xs-5 btn btn-default clear">clear</a>
                    <a class="col-xs-2 " href="reg.php">sign up</a>

                </div>
            </div>
            <div class="col-xs-3"></div>
        </div>







    <?php
    }

    ?>

</div>
</body>
    </html>

<?php
}

