<?php include "htm/header.txt"; ?>
<style>
    body{
        background-image: url('img/background4.png');
    }

    .designer{
        width: 290px;
        height: 290px;
        margin-top: 20px;
        position: relative;
    }
    .designer>img{
        position: absolute;
        top:0px;
        left:0px;
        display: inline-block;
        width: 100%;
        height: 100%;
        border: solid 3px #fff;
        outline: solid 1px #777;
    }

    .designer .description{
        position: absolute;
        top:0px;
        left:0px;
        display: block;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        opacity: 0;
        transition: all 1s;
    }
    .designer:hover .description{
        opacity: 1;
    }

    .designer .description span{
        position: absolute;
        bottom:10px;
        left:50%;
        transform: translateX(-50%);
        color:#fff;
    }
    .designer .description span img{
        margin: 5px;
    }
    
    .contactdetail{
        margin: 10px 0px 10px 0px;
        display: block;
        width: 100%;
        height: 90px;
        position: relative;
        -webkit-box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        background-color: #77f;
    }

    .contactdetail .icon {
        position: absolute;
        top: 0px;
        left: 0px;
        display: inline-block;
        width: 90px;
        height: 90px;
        background-color: #77f;
        padding: 20px;
    }
    .contactdetail .icon img{
        width: 50px;
        height: 50px;
    }

    .contactdetail .detail{
        position: absolute;
        left: 90px;
        top: 0px;
        width: calc(100% - 90px);
        height: 90px;
        background-color: #66f;
    }

    .contactdetail .detail>span{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        color: #fff;
        letter-spacing: 2px;
    }
    .contactdetail .detail>span>a{
        color: #fff;
        cursor: pointer;
    }
    .contactdetail .detail>span>a:hover{
        text-decoration: none;
    }

    .col-md-6-lg{
        position: absolute;
        top:53%;
        transform: translateY(-50%);
    }
    .col-md-6-lg:nth-child(1){
        left:0px;
    }
    .col-md-6-lg:nth-child(2){
        right:60px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <center>
            <div class="designer">
                <img src="img/designer.jpg">
                <div class="description">
                    <span>Student of higher diploma in computer science of infotec international<img src="img/infortec_international_logo.png" width="200" height="75"></span>
                </div>
            </div>
            </center>
        </div>
        <div class="col-md-6"><center>
            <div class="contactdetail">
                <div class="icon">
                    <img src="img/detail-icon-name.png">
                </div>
                <div class="detail">
                    <span>D.G.Disna Nirashan</span>
                </div>
            </div>
            <div class="contactdetail">
                <div class="icon">
                    <img src="img/detail-icon-phone.png">
                </div>
                <div class="detail">
                    <span>+94 71 88 69 344</span>
                </div>
            </div>
            <div class="contactdetail">
                <div class="icon">
                    <img src="img/detail-icon-mail.png">
                </div>
                <div class="detail">
                    <span>cdisnac@gmail.com</span>
                </div>
            </div>
            <div class="contactdetail">
                <div class="icon">
                    <img src="img/detail-icon-fb.png">
                </div>
                <div class="detail">
                    <span><a href="http://facebook.com/tourmatara" target="_blank">facebook.com/tourmatara</a></span>
                </div>
            </div>
            <div class="contactdetail">
                <div class="icon">
                    <img src="img/detail-icon-tweet.png">
                </div>
                <div class="detail">
                    <span><a href="#" target="_blank">twitter account</a></span>
                </div>
            </center></div>
        </div>
    </div>
</div>
<?php include "htm/footer.txt"; ?>
<script src="plugin/zslider/zslider.js"></script>
<script>
    $(".navbar-nav #navContactUs").addClass("active");
    function responcive(){
        if($(window).width()>1000){
            $('.col-md-6').addClass('col-md-6-lg');
        } else {
            $('.col-md-6').removeClass('col-md-6-lg');
        }
    }
    responcive();
    $(window).on("resize",responcive);
</script>