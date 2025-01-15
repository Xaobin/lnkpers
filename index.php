<?php 
$ava="https://www.youtube.com/embed/Su9lRqcvwDo";
$ava2="https://www.youtube.com/watch?v=Su9lRqcvwDo";
$ava3='Su9lRqcvwDo';
//echo explode('</title>', explode('<title>', file_get_contents($ava))[1])[0];
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
    $frente='https://i.ytimg.com/vi_webp/';
    $meio=$urr;
    $fim='/maxresdefault.webp';
    return $frente.$meio.$fim;
}

//$url = $ava2;

// Display Data

//$res=get_youtube($url);
//echo gettype($res);
//echo "<br>";
//print_r($res);


$result="";
$gatilho=0;
$alink="";
if (isset($_GET['inputLink'])){
    $link=$_GET['inputLink'];
    $gatilho=1;
}
if ($gatilho==1){
    $alink=str_replace("http://www.youtube.com/watch?v=","",$link);
    $alink=str_replace("http://youtu.be/","",$link);

    if (strstr($alink,"&")){
        $arr=explode("&",$alink);
        $alink=$arr[0];
    }
//here begin
    $rr=get_youtube($alink);
    $pontos="..........";
    $br="<br>";
    $result.=$pontos.$br;
    $result.=$rr[title].$br;
    $result.=$pontos.$br;

}


?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="/src/assets/no-animal-testing.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Linvk</title>
  </head>
  <body class="bg-gray-800">
   <form> 
    <div class="flex justify-center bg-gray-600">
        <div class="font-bold font-gray-100">Linvk</div> 
    </div>
  
  <div class="container bg-gray-700" style="height='640px'">
    <div class="  mx-10 pt-12   font-md font-gray-100">
       <div>
        <label> Link </label>
        <input type="text"  class="border rounded bg-gray-500" name="inputLink">
      </div>
        <div class="mt-2">
            <submit class="bg-blue-700 hover:bg-blue-600 rounded px-4 py-2 mt-4">Get!</submit>
        </div>
        <div class="mt-6">
        <textarea class="border rounded bg-gray-500 h-40 w-60"><?php echo $result; ?></textarea>
        </div>
    </div>
  </div>  

</form>
  </body>
</html>
