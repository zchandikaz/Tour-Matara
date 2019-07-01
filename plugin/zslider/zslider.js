
function zsilder(id,div,files,width,height,interval,autoresize) {
    if(typeof interval=="undefined") interval=1000;
    if(typeof autoresize=="undefined") autoresize=true;
    if(typeof height=="undefined") height='400px';
    if(typeof width=="undefined") width='100%';
    if(typeof files=="undefined") files='100%';

    this.id = id;
    this.div = div;
    this.files = files;
    this.width = width;
    this.height = height;
    this.interval = interval;
    var self = this;
    var i = 0;
    $(div).append(new $('<div class="zslider" id="'+id+'"><img class="imgfront" src="'+files[0]+'"></div>'));
    $('#'+id).css({'width':width,'height':height});
    if(autoresize){
        $(window).on("resize ready", function () {
            $('#'+id).css({'width':width/1366*$(window).width(),'height':height/1366*$(window).width()});
        });
        $('#'+id).css({'width':width/1366*$(window).width(),'height':height/1366*$(window).width()});
    }
    setInterval(function () {
        $('#'+id+" .imgfront").attr("class","imgback");
        i++;
        i %= self.files.length;
        $('#'+id).append("<img class='imgfront' src='"+self.files[i]+"'>");
        $('#'+id+" .imgfront").css({"opacity":'0'}).animate({"opacity":'1'},1000);
        $('#'+id+" .imgback").animate({"opacity":'1'},1000, function () {
            $(this).remove();
        });
    },interval);
};