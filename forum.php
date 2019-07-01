<?php include "htm/header.txt"; ?>
<style>
    .forumcontainerparent{
        width: 90%;
        padding-top: 10px;
        /*display: block;

        height: 700px;
        overflow-y:scroll;*/
    }

    #txtQ{
        margin: 20px;
        width: 90%;
        text-align: center;
        transform: translateY(-20%);
    }

    body{
        background-image: url("img/background3.png");
    }

    .forumcomment{
        position: relative;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        -webkit-box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);

        text-align: left;
        background-color: #d9edf7;
        border: solid 1px #bce8f1;
    }

    .forumreply{
        position: relative;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        -webkit-box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        margin-left: 50px;
        text-align: right;
        background-color: #dff0d8;
        border: solid 1px #d6e9c6;
    }

    .forumcomment .btnReply{
        position: absolute;
        right:5px;
        bottom: 5px;
        padding: 10px 20px 10px 20px;
        cursor: pointer;
        opacity: 0;
        border: solid 1px #777;
        background-color: #ccc;
        border-radius: 5px;
        transition: all 1s;
    }
    .forumcomment:hover .btnReply{
        opacity: 1;
    }

    .forumcomment .btnReply:hover{
        background-color: #aaa;
    }

    .forumcomment .person,.forumreply .person{
        color: #aaa;
    }
    .forumcomment .person::before,.forumreply .person::before{
        content: '\2014 \00A0';
    }

    .loadconversation{
        padding: 10px;
        margin: 10px;
        color: #fff;
        text-shadow: 0 0 10px #000000;
        letter-spacing: 2px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 1s;
    }
    .loadconversation:hover{
        color: #000;
        text-shadow: 0 0 10px #777;
        text-decoration: none;
    }
</style>
<center>
    <?php
        if(!array_key_exists("loadfullconversation",$_GET))
            echo "<a class='loadconversation' href='forum.php?loadfullconversation=true'>Load Full Conversation</a>";
        else
            echo "<a class='loadconversation' href='forum.php'>Load Only Last 10 Conversations</a>";
    ?>
    <div class="forumcontainerparent">
        <div class="forumcontainer">
<!--            <div class="panel panel-default forumcomment">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <blockquote>
                        <p></p>
                        <footer></footer>
                    </blockquote>
                </div>-->
            </div>
        </div>
    </div>
    <input id="txtQ" type="text" placeholder="Ask your question here" class="form-control">
</center>
<?php include "htm/footer.txt"; ?>
<script>
    $(".navbar-nav #navForum").addClass("active");

    /*function responcive() {
        if($(window).width()>800){
            $('.forumcontainerparent').css("padding-top",px2num($('#myNavbar').css("height"))+20);
            $('.forumcontainerparent').css("height", $(window).height() - px2num($('#myNavbar').css("height")) - px2num($('.footer').css("height")) - px2num($('#txtQ').css("height")) - 2 * px2num($('#txtQ').css("margin")) - 10);
            $('body').css('overflow-y',"hidden");
        } else {
            $('.forumcontainerparent').css('height',400);
            $('body').css('overflow-y',"visible");
        }
    }
    responcive();
    $(window).on("resize",responcive);
    */

    askquestion = function(){
        $.post("action.php",{"action":"askquestion","question":$('#txtQ').val()}, function (data) {
            if(data="ok")
                loadforum();
            else
                alert(data);
        });
        $('#txtQ').val("");
        actionafterlogin = function(){};
    };

    $('#txtQ').keyup(function (e) {
        if(e.which==13){
            if($('#txtQ').val()=="") {
                alert("Question can't be empty");
                return;
            }
            if(isLogged()){
                askquestion();
            } else {
                actionafterlogin = askquestion;
                $('#btnLogin').click();
            }
        }
    });

    scrollbottom = function(){
        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
    };
    
    loadforum = function () {
        $.post("action.php",{"action":get('loadfullconversation')=="true"?"getfullconversation":"getlast10conversation"}, function (htm) {
            $('.forumcontainer').html(htm);
            scrollbottom();
            $('#txtQ').focus();
        });
    };
    loadforum();

    $('.forumcontainer').on("click",".forumcomment .btnReply",function () {
        var indexno = $(this).parent().parent().attr("index");
        prompt("Enter your reply", function (reply) {
            if(reply == null) return;
            if(reply=="") {alert("Reply can't be empty");return;}
            sendreply = function () {
                $.post("action.php",{"action":"sendreply","index":indexno,"reply":reply}, function (data) {
                    if(data="ok")
                        loadforum();
                    else
                        alert(data);
                });
                actionafterlogin = function(){};
            };
            if(isLogged()){
                sendreply();
            } else {
                actionafterlogin = sendreply;
                $('#btnLogin').click();
            }
        });
    });
</script>