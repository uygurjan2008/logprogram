/**
 * Created by Ruzi on 2015/8/19.
 */


$(function(){

    $(".logout").click(function(){
        var pr=confirm("are you sure you want to log out?");
        if(pr){
            $.ajax({
                url:"",
                type:"post",
                data:{
                    logout:true
                },
                success:function(e){

                    window.location.reload();

                }
            });
        }
    });

    $(".submit").click(function(){


        var data=$(".textarea");

        if(data.val().length>20&&$(this).attr("disabled")==undefined) {
            $.ajax({
                url: "post.php",
                type: "post",
                dataType: "json",
                data: {
                    "post": true,
                    data: data.val().toString()
                },
                success: function (e) {
                    console.log(e);
                    if(e.success){
                        alert(e.message);
                        window.location.reload();
                    }else{

                    }
                }
            });


        }else{
            alert("fill it at leat with 10 words");
        }


    });


    $.ajax({
        url:"get.php",
        type:"post",
        dataType:"json",
        data:{get_log:true},
        success:function(e){
            if(e.success){
                //console.log(e.data);
                var dt= e.data;
                var tmp="";

                for (var i = 0; i <dt.length;i++){
                    tmp+="<a class=\"col-xs-12 logs\" id=\""+dt[i].id+"\">"+dt[i].title+"</a>";
                }
                $(".entries").html(tmp);
                $(".logs").click(function(){

                    var id=$(this).attr("id");

                    $.ajax({
                        url:"get.php",
                        type:"post",
                        dataType:"json",
                        data:{id:id},
                        success:function(e){

                            if(e.success){
                               // console.log(e.data);
                                var data= e.data;
                                $(".textarea").val(data.content);
                                $(".submit").attr("disabled","disabled");

                            }else{

                            }
                        }
                    });


                });

            }else{
                console.log(e.data);
            }}

    });

    $(".search").keypress(function(e){

        if(e.keyCode==13){
            var text=$(this).val();
           // alert(text);
            $.ajax({
                url:"get.php",
                type:"post",
                dataType:"json",
                data:{search:true,
                text:text},
                success:function(e){
                   // console.log(e);
                    if(e.success){


                        //console.log(e.data);
                        var dt= e.data;
                        var tmp="";

                        for (var i = 0; i <dt.length;i++){
                            tmp+="<a class=\"col-xs-12 logs\" id=\""+dt[i].id+"\">"+dt[i].title+"</a>";
                        }
                        $(".entries").html(tmp);
                        $(".logs").click(function(){

                            var id=$(this).attr("id");

                            $.ajax({
                                url:"get.php",
                                type:"post",
                                dataType:"json",
                                data:{id:id},
                                success:function(e){

                                    if(e.success){
                                        console.log(e.data);
                                        var data= e.data;
                                        $(".textarea").val(data.content);
                                        $(".submit").attr("disabled","disabled");

                                    }else{

                                    }
                                }
                            });


                        });

                    }
                }

            });

        }
    });




});

