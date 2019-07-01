<?php
if(!array_key_exists("guide",$_GET)) header("Location:tourguidemenu.php");
switch($_GET['guide']){
    case "hotel":
        break;
    case "cinema":
        break;
    case "cabservice":
        break;
    case "shoppingmalls":
        break;
    default:
        header("Location:tourguidemenu.php");
}
?>
<?php include "htm/header.txt"; ?>
<link rel="stylesheet" href="plugin/zslider/zslider.css">
<style>
    body{
        background-image: url("img/background2.png");
    }
    
    .container{
        padding: 0px;
    }

    .tourguide{
        display: inline-block;
        width: 300px;
        height: 200px;
        position: relative;
        margin: 20px 20px 20px 20px;
        box-sizing: border-box;
        border: solid 3px #fff;
        outline: solid 1px #ccc;
        transition: all 1s;
        overflow: hidden;
        -webkit-box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
        box-shadow: 0 0 10px 1px rgba(0,0,0,0.5);
    }
    .tourguide.notmobile:hover{
        transform: scale(1.4);
        z-index: 15;
    }

    .tourguide img{
        position: absolute;
        top:0px;
        left:0px;
        display: block;
        width: 100%;
        height: 100%;
        border: none;
        outline: 0px;
        box-sizing: content-box;
    }
    .tourguide h1{
        position: absolute;
        top:0%;
        left: 0%;
        margin: 0px;
        white-space: nowrap;
        background-color: rgba(0,0,0,0.6);
        display: block;
        width: 100%;
        height: 100%;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 16px;
        transform: scale(1);
        transition: all 500ms;
    }
    .tourguide:hover h1{
        text-align: left;
        opacity: 0;
    }

    .tourguide h1 span{
        position: absolute;
        top:50%;
        left:50%;
        transform: translateX(-50%) translateY(-50%);
    }

    .tourguide .description{
        padding: 8px;
        background-color: rgba(0,0,0,0.7);
        display: block;
        width: 100%;
        height: 40px;
        position: absolute;
        top:100%;
        left: 0px;
        color: #fff;
        font-size: 9px;
        transition: all 500ms;
        transition-delay: 500ms;
        text-align: left;
    }
    .tourguide:hover .description{
        transform: translateY(-100%);
    }

    .tourguide .description h2{
        font-size: 12px;
        margin: 3px 3px 3px 0px;
        text-align: left;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .slider .zslider{
        margin: 12px;
        border: solid 3px #fff;
        outline: solid 1px #ccc;
    }

    #moredetails .modal-body p{
        text-align: left;
    }
</style>
<div class="container"><center>
        <div class="modal fade" id="moredetails" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="slider"></div>
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        function OpenFile($filename){
            $filesize = filesize($filename);
            $myfile = fopen($filename, "r") or die("Unable to open file!");
            if($filesize==0) return "";
            $filecontent = fread($myfile,$filesize);
            fclose($myfile);
            return $filecontent;
        }

        chdir("tourguide");
        chdir($_GET['guide']);
        foreach(array_filter(glob('*'),'is_dir') as $d){
            echo '<div class="tourguide">';
            echo ' <img class="thumb" src="tourguide/'.$_GET['guide'].'/'.$d.'/thumb.png">';
            echo ' <h1><span>'.$d.'</span></h1>';
            $txt = OpenFile($d."/description.txt");
            echo '<div class="description"><h2>'.$d.'</h2></div>';
            echo '<div hidden="hidden" class="data-text">';
            echo $txt;
            echo '</div>';
            echo '<div hidden="hidden" class="data-img">';
            foreach(array_filter(glob($d.'/*'),'is_file') as $f) {
                if($f==$d.'/thumb.png' || $f==$d.'/description.txt' || $f==$d.'/Thumbs.db') continue;
                echo '<span>'.'tourguide/'.$_GET['guide'].'/'.$f.'</span>';
            }
            echo '</div>';
            echo '</div>';
        }
        chdir('..');
        chdir('..');
        ?>
    </center></div>
<?php include "htm/footer.txt"; ?>
<script src="plugin/zslider/zslider.js"></script>
<script>
    var slider = new zsilder("myslider","#moredetails .slider",["img/loading.gif","img/loading.gif"],500,350,2000,false);
    $('.tourguide').click(function() {
        $('#moredetails .modal-body p').html($(this).children('.data-text').html());
        slider.files = [];
        $(this).children(".data-img").children("span").each(function () {
            slider.files.push($(this).html());
        });
        $('#moredetails .modal-title').html($(this).children('h1').html());
        $('#myslider img').each(function () {
            $(this).attr('src',"img/loading.gif");
        });
        $('#moredetails').modal();
    });
    $(".navbar-nav #navTourGuide").addClass("active");
    switch(get('guide')){
        case "hotel":
            $(".navbar-nav #navHotel").addClass("active");
            break;
        case "cinema":
            $(".navbar-nav #navCinema").addClass("active");
            break;
        case "cabservice":
            $(".navbar-nav #navCabService").addClass("active");
            break;
        case "shoppingmalls":
            $(".navbar-nav #navShoppingMalls").addClass("active");
            break;
        default:
            break;
    }

    if($(window).width()<400){
        $('.tourguide').css({'margin-left':'0px','margin-right':'0px'});
        var slider = new zsilder("myslider","#moredetails .slider",["img/loading.gif","img/loading.gif"],500/1.9,350/1.9,2000,false);
    }

    function responcive(){
        if($(window).width()>800){
            $('.tourguide').addClass('notmobile');
        } else {
            $('.tourguide').removeClass('notmobile');
        }
    }
    responcive();
    $(window).on("resize",responcive);
</script>