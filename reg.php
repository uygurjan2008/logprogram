<?php
/**
 * Created by PhpStorm.
 * User: Ruzi
 * Date: 2015/8/18
 * Time: 16:42
 */




?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>log program</title>
    <link rel="stylesheet" href="lib/plugins/bootstrap/css/bootstrap.css" />

    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script>
        $(function(){

            $(".signup").click(function(){
                var uname=$("input[name='username']").val();
                var upass=$("input[name='password']").val();
                var rpass=$("input[name='re-password']").val();

                if(uname.length>0) {

                    if(upass.length>0&&rpass.length>0) {

                      if(upass==rpass) {

                          $.ajax({
                              url: "check.php",
                              type: "post",
                              dataType: "json",
                              data: {
                                  username: uname,
                                  userpass: upass,
                                  operation: "signup"
                              },
                              success: function (e) {
                                  console.log(e);
                                  if (e.success) {

                                      window.location.href = "index.php";

                                  } else {
                                      alert(e.message);
                                  }
                              }
                          });

                      }else{
                          alert("password are not the same");

                      }


                    }else{
                        alert("password is void");
                    }
                }else{
                    alert("username is void");
                }

            });

            $(".clear").click(function(){
                $("input[name='username']").val("");
                $("input[name='password']").val("");
                $("input[name='re-password']").val("");

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
                <input class="col-xs-7" type="text" name="username" /></div>
            <div class="col-xs-12" style="line-height: 30px;margin-bottom: 5px;">
                <label class="col-xs-5" for="" style="width: 120px;">password</label>
                <input class="col-xs-7" type="password" name="password"/></div>
            <div class="col-xs-12" style="line-height: 30px;margin-bottom: 5px;">
                <label class="col-xs-5" for="" style="width: 120px;">re-password</label>
                <input class="col-xs-7" type="password" name="re-password"/></div>
            <div class="col-xs-12">

                <a class="col-xs-5 btn btn-default signup" style="width: 120px;">sign up</a>
                <a class="col-xs-7 btn btn-default clear">clear</a>
            </div>
        </div>
        <div class="col-xs-3"></div>
    </div>
</div>
</body>
</html>