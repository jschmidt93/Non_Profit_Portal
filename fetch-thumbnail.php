<?php
function getImg($url){
// create & initialize a curl session
$curl = curl_init();
$query = "https://www.youtube.com/oembed?url=".$url."&format=json&maxwidth=600&maxheight=600";
// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, $query );

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);

$json = json_decode($output, true);


return $json['thumbnail_url'];
}

?>