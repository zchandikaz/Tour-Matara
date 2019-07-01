<?php
$con = new MySQLi("127.0.0.1","root","","tourmatara");

function query($query,$ShowQuery=false,$ShowError=false){
    global $con;
    if($ShowQuery) die($query);
    $r = mysqli_query($con,$query);
    if($ShowError) if(!($r === TRUE)) die("ERROR IN QUERY<br>".$query);
    return $r;
}

function queryd($query,$ShowQuery=false){
    global $con;
    if($ShowQuery) die($query);
    $result = mysqli_query($con,$query);
    $resultarr = array();
    if(empty($result) || is_null($result)) return array();
    for($i=0;$i<$result->num_rows;$i++){
        array_push($resultarr,mysqli_fetch_row($result));
    }
    return $resultarr;
}

function mydate(){ date_default_timezone_set('Asia/Calcutta'); return date("Y-m-d"); }
function mytime(){ date_default_timezone_set('Asia/Calcutta'); return date("h:i:s A"); }

function has_sql_injection_chars($txt){
    return stristr($txt,'"')||stristr($txt,"'");
}

function rsc($txt,$space=true,$quotesonly=false){ //remove_special_chars
    $txt = str_replace("'","&#39;",$txt);
    $txt = str_replace('"',"&quot;",$txt);
    $txt = str_replace('/',"&#47;",$txt);
    $txt = str_replace('<',"&lt;",$txt);
    $txt = str_replace('>',"&gt;",$txt);
    $txt = str_replace('@',"&#64;",$txt);
    return $txt;
}
if(!array_key_exists("action",$_POST)) die("Invalid call");
switch($_POST["action"]){
    case 'askquestion':
        if(array_key_exists("question",$_POST)){
            if(array_key_exists("login_name",$_COOKIE) && array_key_exists("login_email",$_COOKIE)){
                query("insert into forum (text,name,email,date,time) values('".rsc($_POST['question'])."','".rsc($_COOKIE["login_name"])."','".rsc($_COOKIE["login_email"])."','".mydate()."','".mytime()."')");
                die("ok");
            } else {
                die("you have to login first");
            }
        } else {
            die("data not found");
        }
        break;
    case 'sendreply':
        if(array_key_exists("reply",$_POST) && array_key_exists("index",$_POST)){
            if(array_key_exists("login_name",$_COOKIE) && array_key_exists("login_email",$_COOKIE)){
                query("insert into forumreply (forumindexno,text,name,email,date,time) values('".rsc($_POST['index'])."','".rsc($_POST['reply'])."','".rsc($_COOKIE["login_name"])."','".rsc($_COOKIE["login_email"])."','".mydate()."','".mytime()."')");
                die("ok");
            } else {
                die("you have to login first");
            }
        } else {
            die("data not found");
        }
        break;
    case "getforum":
        die(json_encode(queryd("select name,text,date,time,indexno from forum")));
        break;
    case "getreply":
        if(array_key_exists("indexno",$_POST)){
            if(has_sql_injection_chars($_POST["indexno"])) die("Invalid symbols found");
            die(json_encode(array($_POST["indexno"],queryd("select name,text,date,time from forumreply where forumindexno='".$_POST["indexno"]."'"))));
        }
        break;
    case 'getfullconversation':
        $htm = "";
        foreach(queryd("select name,text,date,time,indexno from forum") as $qrow){
            $htm .= '<div class="forumcomment" index="'.$qrow[4].'"><span title="'.$qrow[2].' '.$qrow[3].'" class="person">'.$qrow[0].'</span><div class="text">'.$qrow[1].'<button class="btnReply">Reply</button></div></div>';
            foreach(queryd("select name,text,date,time from forumreply where forumindexno='".$qrow[4]."'") as $rrow){
                $htm .= '<div class="forumreply"><span title="' . $rrow[2] . ' ' . $rrow[3] . '" class="person">' . $rrow[0] . '</span><div class="text">' . $rrow[1] . '</div></div>';
            }
        }
        die($htm);
        break;
    case 'getlast10conversation':
        $htm = "";
        foreach(queryd("select name,text,date,time,indexno from forum where indexno > (select max(indexno)-10 from forum)") as $qrow){
            $htm .= '<div class="forumcomment" index="'.$qrow[4].'"><span title="'.$qrow[2].' '.$qrow[3].'" class="person">'.$qrow[0].'</span><div class="text">'.$qrow[1].'<button class="btnReply">Reply</button></div></div>';
            foreach(queryd("select name,text,date,time from forumreply where forumindexno='".$qrow[4]."'") as $rrow){
                $htm .= '<div class="forumreply"><span title="' . $rrow[2] . ' ' . $rrow[3] . '" class="person">' . $rrow[0] . '</span><div class="text">' . $rrow[1] . '</div></div>';
            }
        }
        die($htm);
        break;
    default:
        break;
}