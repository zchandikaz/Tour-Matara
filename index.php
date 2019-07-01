<?php include "htm/header.txt"; ?>
<link rel="stylesheet" href="plugin/zslider/zslider.css">
<style>
    /*.zslider img{
        filter: blur(1px)!important;
        -webkit-filter: blur(1px)!important;
    }*/
    body{
        background-image: url("img/background0.png");
    }

    .zslider h1{
        position: absolute;
        top:50%;
        left:50%;
        transform: translateX(-50%) translateY(-50%);
        z-index: 3;
        color: #fff;
        font-size: 11vw;
        text-shadow: 0px 0px 10px #000;
        letter-spacing: 1vw;
    }
    .zslider h1 span{
        font-family: 'yesteryearz';
        text-shadow: 0px 0px 10px #000;
    }
    /*.zslider h1 span:first-child{
        text-shadow: 0px 0px 10px #f55;
    }
    .zslider h1 span:last-child{
        text-shadow: 0px 0px 10px #55f;
    }*/

    .zslider .mask{
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        top:0px;
        left: 0px;
        background-color: #000;
        opacity: 0.4;
        z-index: 2;
    }

    .zslider .buttonset{
        position: absolute;
        top:80%;
        left: 50%;
        transform: translateX(-50%);
        z-index: 4;
    }
    .zslider .buttonset span{
        padding: 15px;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin: 5px;
        border-radius: 5px;
        background-color: rgba(0,0,0,0.4);
        color: #aaa;
        border: solid 1px rgba(0,0,0,0.6);
        font-size: 10px;
        width: 150px;
        cursor: pointer;
    }
    .zslider .buttonset span:hover{
        background-color: rgba(0,0,0,0.7);
    }
    a:hover{
        text-decoration: none;
    }
    .col-md-4 p{
        padding: 5px;
		height:63px;
    }
    .readmore{
        cursor: pointer;
        background-color: #f55;
        padding: 10px 20px 10px 20px;
        border-radius: 3px;
    }
    .readmore:hover{
        background-color: #c55;
    }
    .readmore,.readmore:hover,.readmore:focus,.readmore:visited{
        text-decoration: none;
        color: #fff;
    }
</style>
<div class="myslider_container"></div>
    <div class="container">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">History of Matara</div>
            <div class="panel-body">
                Matara historically belongs to the area that was called the Kingdom of Ruhuna, which was one of the three kingdoms in Sri Lanka (Thun Sinhalaya). Matara was previously called Mahathota. The Nilwala River runs through Matara and there was a wide area where ferries used to cross. Hence, the town was called Maha Thota which was derived from the Sanskrit word Maha Theertha, which means "the great ferry". According to Thotagamuwe Sri Rahula Thera's Paravi Sndesaya King Weerabamapanam made Matara as his capital and named it "Mapatuna". The temple in the middle of the town is also built by ancient kings, and now it is a very popular sacred place among the Buddhists in the area.<br><br>
                In the 16th and 18th centuries, Matara was ruled by the Portuguese and the Dutch respectively.<br><br>
                In 1672 the Portuguese called the town "Maturai", which means a great fortress. This may have been a mispronunciation of Thurai, which is the Tamil word for "Ferry". The present name of "Matara," however, has been in used for the last three centuries, relating to the town's connection with the Nilwala River.<br><br>
                In 1756 the Dutch captured the Maritime Province and divided it into four administrative areas — Sabaragamuwa, Sath Korle, Sathara Korele and Matara. Out of these, Matara District covered the largest area (essentially the whole of the Southern Province up to the Kaluganga River). In the deed given by King Dharmapala to the Dutch, it mentioned that the area of Matara District extended from Kotte to Walawe Ganga River.<br><br>
                In 1760 the fort was successfully attacked by forces from the Kandyan kingdom. Matara maintained in the hands of the Sinhalese for almost one year. In 1762, the Dutch recaptured Matara Fort, without any significant resistance. Matara was the second most important fort, behind Galle fort, for the southern maritime provinces of the Dutch and a commanding base for some inland forts.<br><br>
                In 1796 the fort was ceremoniously handed over to the British. The Dutch and English culture and architecture can still be seen throughout the area. The lighthouse in Point Dondra was built by the Dutch, and it is considered one of the most beautiful and oldest lighthouses in Sri Lanka. The two fortresses, the Matara fort and the Star fort, that were built by the Dutch can be found in the city. Other important Colonial works are the St Mary's Church and the marketplace at Nupe Junction.<br><br>
    The most famous thinkers who lived in the area are Kumaratunga Munidasa and Gajaman Nona. The ethnic majority of Matara is Sinhalese; during the 16th and 17th centuries Moors arrived in the area as traders from Arabia. Today their descendants coexist with Sinhalese peacefully as an ethnic minority.<br><br>
    </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <center>
                <div class="panel panel-default">
                    <div class="panel-heading">Tourist Point</div>
                    <div class="panel-body"><img class="img-circle" src="img/home-col-1.png" width="120" height="120"><p>When you come to matara you can visit this places.</p><a href="touristpoint.php" class="readmore">Read More</a></div>
                </div>
            </center>
        </div>
        <div class="col-md-4">
            <center>
                <div class="panel panel-default">
                    <div class="panel-heading">Tour Guide</div>
                    <div class="panel-body"><img class="img-circle" src="img/home-col-2.png" width="120" height="120"><p>We have a immediate service on behalf you.So you can seve your time.</p><a href="tourguide.php" class="readmore">Read More</a></div>
                </div>
            </center>
        </div>
        <div class="col-md-4">
            <center>
                <div class="panel panel-default">
                    <div class="panel-heading">Forum</div>
                    <div class="panel-body"><img class="img-circle" src="img/home-col-3.png" width="120" height="120"><p>If you doubt you can ask any question.It's for your easy.</p><a href="forum.php" class="readmore">Read More</a></div>
                </div>
            </center>
        </div>
    </div>
</div>
<?php include "htm/footer.txt"; ?>
<script src="plugin/zslider/zslider.js"></script>
<script>
    new zsilder("myslider",".myslider_container",[
        "img/home img (1).png",
        "img/home img (2).png",
        "img/home img (3).png",
        "img/home img (4).png",
        "img/home img (5).png",
        "img/home img (6).png",
        "img/home img (7).png",
        "img/home img (8).png",
        "img/home img (9).png"
    ],"100%",600,5000);

    $('#myslider').append(new $("<h1><span>Tour</span><span>Matara</span></h1>"));
    $('#myslider').append(new $("<div class='mask'></div>"));
    $('#myslider').append(new $("<div class='buttonset'><a href='forum.php'><span>Ask Question</span></a><a href='contactus.php'><span>Contact Us</span></a></div>"));

    $(window).on("resize ready", function () {
        if($(window).width()<800){
            $('.zslider .buttonset').hide();
        }
    });
    if($(window).width()<800){
        $('.zslider .buttonset').hide();
    }

    $(".navbar-nav #navHome").addClass("active");
</script>