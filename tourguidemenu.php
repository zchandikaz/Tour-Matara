<?php include "htm/header.txt"; ?>
<style>
    body{
        background-image: url("img/background2.png");
    }
    .tourguide{
        display: block;
        width: 250px;
        height: 250px;
        position: relative;
        margin-left:50%;
        transform: translateX(-50%);
        margin-top: 60px;
        border: solid 3px #fff;
        outline: solid 1px #aaa;
        border-radius: 2px;
        -webkit-box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        box-shadow: 0 0 10px 2px rgba(0,0,0,0.3);
    }
    .tourguide:before{
        content: "";
        background-color: #000;
        opacity: 0.6;
        position: absolute;
        top:0px;
        left:0px;
        display: block;
        width: 100%;
        height: 100%;
        z-index: 2;
        transition: all 1s;
    }
    .tourguide:hover::before{
        opacity: 0.4;
    }
    .tourguide>img{
        display: block;
        width: 100%;
        height: 100%;
        filter:blur(1px);
        -webkit-filter:blur(6px);
        z-index: 1;
        transition: all 1s;
    }
    .tourguide:hover>img{
        filter:blur(0px);
        -webkit-filter:blur(0px);
    }
    .tourguide>span{
        position: absolute;
        left:50%;
        top:50%;
        transform: translateX(-50%) translateY(-50%);
        font-size: 18px;
        font-weight: lighter;
        white-space: nowrap;
        letter-spacing: 3px;
        color: #fff;
        z-index: 3;
        text-shadow: 0 0 5px #000000;
    }
</style>
<div class="container"><center>
        <div class="row">
        <div class="col-md-3"><a class="tourguide"  href="tourguide.php?guide=hotel"><img src="img/tourguide_hotel.jpg"><span>Hotel</span></a></div>
        <div class="col-md-3"><a class="tourguide" href="tourguide.php?guide=cabservice"><img src="img/tourguide_cabservice.jpg"><span>Cab Service</span></a></div>
        <div class="col-md-3"><a class="tourguide" href="tourguide.php?guide=cinema"><img src="img/tourguide_cinema.jpg"><span>Cinema</span></div></a>
        <div class="col-md-3"><a class="tourguide" href="tourguide.php?guide=shoppingmalls"><img src="img/tourguide_shoppingmalls.jpg"><span>Shopping Malls</span></a></div>
    </div>
</center></div>
<?php include "htm/footer.txt"; ?>