<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
function get_youtube($url){

    $youtube = "https://www.youtube.com/oembed?url=".$url."&format=json";
//$youtube=$url."&format=json";
    $curl = curl_init($youtube);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($curl);
    curl_close($curl);
    return json_decode($return, true);
}

function imgFeita($urr){
    $frente="https://i.ytimg.com/vi_webp/";
    $meio=$urr;
    $fim="/maxresdefault.webp";
    return $frente.$meio.$fim;
}

function retornador($iii,$ttt){
    $arry=Array();
    if ($ttt!=''){
        $title=base64_encode($ttt);
        $imagem=base64_encode($iii);
        $arry=array('titulo'=>$title,'imagem'=>$im);
    }
    else{
        $imagem=base64_encode($iii);
        $arry=array('imagem'=>$imagem);
    }
    
    $json=json_encode($arry);

    echo $json;
}

$result="";
$gatilho=0;
$alink="";
$pss="";
$logado=false;
$avalia=false;
if (isset($_GET['pss'])){
    $pss=$_GET['pss'];
    if ($pss=="89uihjbn"){$logado=true; } 
    //else{ echo "<br>Not logged<br>"; }
}
if ((isset($_GET['link']))and($logado==true) ) {
    $link=$_GET['link'];
    $gatilho=1;
   
    if (isset($_GET['avalia'])){
        $avalia=$_GET['avalia'];
        
        if ($avalia=='verd'){ $gatilho=2;  }
        //else{ echo "<br> avalia false<br>"; } 
    }
}

if ($gatilho==1){
    $alink=$link;
    $alink=str_replace("https://www.youtube.com/watch?v=","",$link);
    $alink=str_replace("https://youtu.be/","",$link);
    
///*
    if (strstr($alink,"&")){
        $arr=explode("&",$alink);
        $alink=$arr[0];
    }
    $rr=get_youtube($link);
    $title=$rr['title'];
    $imagem=imgFeita($alink);

    retornador($imagem,$title);
    //echo $title;
    //echo "<br>";
    
//*/

}
if ($gatilho==2){
    $alink=$link;
    $alink=str_replace("https://www.youtube.com/watch?v=","",$link);
    $alink=str_replace("https://youtu.be/","",$link);
    
///*
    if (strstr($alink,"&")){
        $arr=explode("&",$alink);
        $alink=$arr[0];
    }
  
    $imagem=imgFeita($alink);
    
    retornador($imagem,'');

}    






?>