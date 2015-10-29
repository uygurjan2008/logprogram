/**
 * Created by Ruzi on 2015/8/15.
 */

$(function(){


    /**
     * accept the terms
     *
     */

    $("#accept1").click(function(){
        var next1=$("#next1");
        var ac1=$("#accept1")[0];
        if(ac1.checked){
            next1.removeAttr("disabled");
            next1.click(function(){


                if(next1.attr("disabled")==undefined) {
                    var p1=$(".p1");
                    var p2= $(".p2");
                    var p3=$(".p3");
                    var p4=$(".p4");
                    p1.addClass("hidden");

                    p2.removeClass("hidden");

                    var previous1 = $("#previous1");

                    var next2 = $("#next2");
                    /**
                     * return to page 1
                     */
                    previous1.click(function () {
                        p1.removeClass("hidden");
                        p2.addClass("hidden");

                    });


                    var previous2 = $("#previous2");
                    var local_network=$("input[name='rd1']");

                    var db_host=$("input[name='db_host']");
                    var db_username=$("input[name='db_username']");
                    var db_password=$("input[name='db_password']");
                    var db_dbname=$("input[name='db_dbname']");



                    local_network.click(function(){

                        var vl=$(this).val();
                        if(vl==2){
                            //network
                            db_host.removeAttr("disabled");
                            db_host.val("");
                            db_username.val("");
                            db_password.val("");
                            db_dbname.removeAttr("disabled");
                            db_dbname.val("");

                        }else{
                            //localhost
                            db_host.attr("disabled","disabled");
                            db_host.val("localhost");
                            db_username.val("root");
                            db_password.val("");
                            db_dbname.attr("disabled","disabled");
                            db_dbname.val("bookstore");

                        }
                    });





                    next2.click(function () {

                        var rs=false;
                        $.ajax({
                            url:"install.php",
                            type:"post",
                            dataType:"json",
                            async:false,
                            data:{
                                db_host:db_host.val(),
                                db_username:db_username.val(),
                                db_password:db_password.val(),
                                db_name:db_dbname.val()
                            },
                            success:function(e){
                                console.log("result:",e);
                                rs= e.success;


                            }
                        });

                        if(rs) {
                            p2.addClass("hidden");
                            p4.removeClass("hidden");
                        }


                    });


                    /**
                     * page 4
                     */

                    var next3 = $("#next3");
                    next3.click(function () {

                        p2.addClass("hidden");
                        p4.removeClass("hidden");
                    });
                    $("#finish").click(function(){
                        location.reload();
                    });

                }






            });
        }else{
            next1.attr("disabled","disabled");
        }

    });




});

