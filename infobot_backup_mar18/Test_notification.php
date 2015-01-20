<?php



$message = urlencode ("laluuuuu!!!");

echo "<br>!!$fb_id";


$redirect_url= urlencode ("http://apps.facebook.com/infobot/studentviewattendance.php") ;

$url = "https://graph.facebook.com/1267729545/notifications?access_token=304045013036764|bd07dae8399b5dd49969b7cae0654e52&template=$message&href=index.php?bounceback_url=$redirect_url";
    
    $data = array('key1' => 'value1', 'key2' => 'value2');

    // use key 'http' even if you send the request to https://...
    $options = array('http' => array('method'  => 'POST','content' => http_build_query($data)));
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    var_dump ($result);




?>