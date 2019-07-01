alert_ = window.alert;
confirm_ = window.prompt;
prompt_ = window.prompt;

window.alert = bootbox.alert;
window.confirm = bootbox.confirm;

window.prompt = function prompt (text,func,defval) {
    if(typeof defval=='undefined') defval="";
    bootbox.prompt({title:text,value:defval,callback:func});
};
px2num = function(val) {
    return parseFloat(val.substr(0, val.length - 2));
};

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
str_replace = function (str, find, replace) {
    while(str.search(find)>0){
        str = str.replace(find,replace);
    }
    return str;
};
function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return str_replace(decodeURIComponent(name[1]),/\+/g,' ');
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function checkEmail(emailAddress) {
    var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
    var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
    var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
    var sQuotedPair = '\\x5c[\\x00-\\x7f]';
    var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
    var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
    var sDomain_ref = sAtom;
    var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
    var sWord = '(' + sAtom + '|' + sQuotedString + ')';
    var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
    var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
    var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
    var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

    var reValidEmail = new RegExp(sValidEmail);

    return reValidEmail.test(emailAddress);
}

actionafterlogin = function(){};

$('#btnLogin').click(function () {
    $('#modallogin').modal();
});
$('#modallogin_btnLogin').click(function () {
    var name = $('#modallogin_txtName').val();
    var email =$('#modallogin_txtEmail').val();

    if(name=="") { alert("Name can't be empty");$('#modallogin').modal();return; }
    if(email=="") { alert("E mail can't be empty");$('#modallogin').modal();return; }
    if(!checkEmail(email)) { alert("Invalid email address");$('#modallogin').modal();return; }

    setCookie("login_name",name,7);
    setCookie("login_email",email,7);
    $('#spUser span').html(" "+getCookie('login_name'));
    $('#spUser').show();
    $('#btnLogin').hide();
    $('#btnLogout').show();
    actionafterlogin();
});

function isLogged(){
    return getCookie("login_name")!="" && getCookie("login_email")!="";
}

function checklogin(){
    if(isLogged()){
        $('#spUser span').html(" "+getCookie('login_name'));
        $('#spUser').show();
        $('#btnLogin').hide();
        $('#btnLogout').show();
    } else {
        $('#btnLogout,#spUser').hide();
        $('#btnLogin').show();
    }
}

$('#btnLogout').click(function () {
    confirm("Do you want to logout?", function (result) {
       if(!result) return;
        setCookie("login_name","",-1);
        setCookie("login_email","",-1);
        checklogin();
    });
});
checklogin();

$('#spUser').click(function () {
    alert("Current User : <b>"+getCookie("login_name")+"</b><br>Current Email : <b>"+getCookie("login_email")+"</b>");
});

$('body').css('margin-top',$('.navbar').css('height'));
$('body').css('margin-bottom',$('.footer').css('height'));