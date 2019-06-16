<?php
session_start();
$triggerDateTime = date('Y-m-d H:i');
$todaydate = date("Y-m-d");
if($todaydate == '2019-06-16'){
	$matchid = 13071965984;
}
if($todaydate == '2019-06-17'){
	$matchid = 13071965985;
}
if($todaydate == '2019-06-18'){
	$matchid = 13071965986;
}
if($todaydate == '2019-06-19'){
	$matchid = 13071965987;
}
if($todaydate == '2019-06-20'){
	$matchid = 13071965988;
}

$xmlobj = new SimpleXMLElement("https://www.goalserve.com/getfeed/da17097c5fa94c8b9be6a0809c5014e5/cricket/livescore?matchid=".$matchid,null,true);

if( $xmlobj->category ) {
$matchexists = "yes";
} else {
$matchexists = "no";
$moment = "gen";
}

if($matchexists == "yes"){
$status = $xmlobj->category->match[0]->attributes()->status;
//$venue = $xmlobj->category->match[0]->attributes()->venue;
if($status != 'In Progress'){
	$moment = "gen";
}

if($status == 'In Progress'){
if($xmlobj->category->match[0]->commentaries->commentary[0]){
$lastball0 = $xmlobj->category->match[0]->commentaries->commentary[0]->attributes()->post;
}
if($xmlobj->category->match[0]->commentaries->commentary[1]){	
$lastball1 = $xmlobj->category->match[0]->commentaries->commentary[1]->attributes()->post;
}
if($xmlobj->category->match[0]->commentaries->commentary[2]){
$lastball2 = $xmlobj->category->match[0]->commentaries->commentary[2]->attributes()->post;
}
if($xmlobj->category->match[0]->commentaries->commentary[3]){
$lastball3 = $xmlobj->category->match[0]->commentaries->commentary[3]->attributes()->post;
}
if($xmlobj->category->match[0]->commentaries->commentary[4]){
$lastball4 = $xmlobj->category->match[0]->commentaries->commentary[4]->attributes()->post;
}
if($xmlobj->category->match[0]->commentaries->commentary[5]){
$lastball5 = $xmlobj->category->match[0]->commentaries->commentary[5]->attributes()->post;
}
	
$lastball_fullvalue = $lastball0 . " | " . $lastball1 . " | " . $lastball2 . " | " . $lastball3 . " | " . $lastball4 . " | " . $lastball5;
	
//$lastball = "he is 4 runs now";
	
if (strpos($lastball_fullvalue, 'OUT') != false) {
    $moment = "out";
	$lastball_fullvalue = "";
}
elseif ( (strpos($lastball_fullvalue, 'SIX runs') == true) || (strpos($lastball_fullvalue, '6 runs') == true) || (strpos($lastball_fullvalue, 'FOUR runs') == true) || (strpos($lastball_fullvalue, '4 runs') == true)){
    $moment = "hit";
}
else {
	$moment = "gen";
}
	
}

//echo $lastball_fullvalue . "<br>";
/*
if($moment == "out" || $moment == "hit"){
	$endDateTime = date('Y-m-d H:i',strtotime('+3 minutes',strtotime($triggerDateTime)));	
	$_SESSION["endDateTime"] = $endDateTime; 
	$_SESSION["moment"] = $moment;
}

if($_SESSION["endDateTime"] > $triggerDateTime){
	$moment = $_SESSION["moment"];
}
else {
	$moment = "gen";
}
*/

// set dynamic content starts
}

//$moment = "hit50";

if($moment == "gen"){
	$image_300x250 = "https://cache-ssl.celtra.com/api//blobs/4d7c0d293dc1e9d2ff39d9b1be3e2537b96ff6addaef36b51904dda79441cc0d/clear_prematch.png?transform=crush&quality=256";
	$image_300x600 = "https://cache-ssl.celtra.com/api//blobs/58c48a5acf434b7e40d5bc41e616d2d562a0643b773b62aea8a8809ae40bf3d0/clear_prematch.png?transform=crush&quality=256";
	$image_970x250 = "https://cache-ssl.celtra.com/api//blobs/9aceb615d4e8a536d68c574466bb33f7d58f4f19a8d405f396763153d458ae0d/clear_prematch.png?transform=crush&quality=256";
	$promo_300x250 = "https://cache-ssl.celtra.com/api//blobs/5da70140e7577ab53efc238614f1839637a9dc16cbecb1cf7acf39be431a5fa8/code_40.png?transform=crush&quality=256";
	$promo_300x600 = "https://cache-ssl.celtra.com/api//blobs/aa7e0fe1778f354c19b26b27e5c2e44618d708d2d084c171ed15da08cc7de361/code_40.png?transform=crush&quality=256";
	$promo_970x250 = "https://cache-ssl.celtra.com/api//blobs/fa983f928beea11561b37f50f633ae5803d1de63e7d4164f7a57a28be0c1d838/code_40.png?transform=crush&quality=256";
	$cta_link = "https://www.luluhypermarket.com/en-ae/-grocery/c/HYUAE02";
	$reportLabel = $moment;
}
if($moment == "hit"){
	$image_300x250 = "https://cache-ssl.celtra.com/api//blobs/d97c5680ac1d549f4c28f00bbf5a7f001aa707589541ff80c16ac22ada60b8c7/clear_hit.png?transform=crush&quality=256";
	$image_300x600 = "https://cache-ssl.celtra.com/api//blobs/4c4396dc772eef0a59d16d842ca2faf856c6c76129d5c17c80064b2f1a7d7382/clear_hit.png?transform=crush&quality=256";
	$image_970x250 = "https://cache-ssl.celtra.com/api//blobs/318d442fecdc794c3d86ed15967b2fc2edfde1b3085a36b3dd3f46e184a08a85/clear_hit.png?transform=crush&quality=256";
	$promo_300x250 = "https://cache-ssl.celtra.com/api//blobs/ffcf9ba658ccb1d74556e1b7bca896ab941382ff4609cd010511280135c942e9/dandruff-free.png?transform=crush&quality=256";
	$promo_300x600 = "https://cache-ssl.celtra.com/api//blobs/645f613898a8d8392c6d9eb0ef4408c1ec4845148e0bf08e0cce0a14f1d692ad/dandruff-free.png?transform=crush&quality=256";
	$promo_970x250 = "https://cache-ssl.celtra.com/api//blobs/fd57d6aefbb806906075142497ee5a7615786d71a74f9d1f57e6f69d9dade50d/dandruff-free.png?transform=crush&quality=256";
	$cta_link = "https://www.luluhypermarket.com/en-ae/-grocery/c/HYUAE03";
	$reportLabel = $moment;
}
if($moment == "out"){
	$image_300x250 = "https://cache-ssl.celtra.com/api//blobs/2ea4f5dc584a30e5792838a7e9aca282f8b43755ceceed672909a48547b37650/clear_out.png?transform=crush&quality=256";
	$image_300x600 = "https://cache-ssl.celtra.com/api//blobs/450d7e2a1124c036062d469e8a6f9b0cf3de6cd0f8dbc8d4e17fe85259c0662d/clear_out.png?transform=crush&quality=256";
	$image_970x250 = "https://cache-ssl.celtra.com/api//blobs/0c724a381a32c2aebf361adf4dddf8b52deb07825f00f48441c509248e846858/clear_out.png?transform=crush&quality=256";
	$promo_300x250 = "https://cache-ssl.celtra.com/api//blobs/5da70140e7577ab53efc238614f1839637a9dc16cbecb1cf7acf39be431a5fa8/code_40.png?transform=crush&quality=256";
	$promo_300x600 = "https://cache-ssl.celtra.com/api//blobs/aa7e0fe1778f354c19b26b27e5c2e44618d708d2d084c171ed15da08cc7de361/code_40.png?transform=crush&quality=256";
	$promo_970x250 = "https://cache-ssl.celtra.com/api//blobs/fa983f928beea11561b37f50f633ae5803d1de63e7d4164f7a57a28be0c1d838/code_40.png?transform=crush&quality=256";
	$cta_link = "https://www.luluhypermarket.com/en-ae/-grocery/c/HYUAE02";
	$reportLabel = $moment;
}
if($moment == "hit50"){
	$image_300x250 = "https://cache-ssl.celtra.com/api//blobs/d97c5680ac1d549f4c28f00bbf5a7f001aa707589541ff80c16ac22ada60b8c7/clear_hit.png?transform=crush&quality=256";
	$image_300x600 = "https://cache-ssl.celtra.com/api//blobs/4c4396dc772eef0a59d16d842ca2faf856c6c76129d5c17c80064b2f1a7d7382/clear_hit.png?transform=crush&quality=256";
	$image_970x250 = "https://cache-ssl.celtra.com/api//blobs/318d442fecdc794c3d86ed15967b2fc2edfde1b3085a36b3dd3f46e184a08a85/clear_hit.png?transform=crush&quality=256";
	$promo_300x250 = "https://cache-ssl.celtra.com/api//blobs/b30defbc213da8baa4a4e2d16f8f488f3e0e4941f3a335a5544edb60c281e6aa/code_50.png?transform=crush&quality=256";
	$promo_300x600 = "https://cache-ssl.celtra.com/api//blobs/e614e13aadc983bd7254f782840bda79f0a6524b25de9d4f4cdff55f8fff7046/code_50.png?transform=crush&quality=256";
	$promo_970x250 = "https://cache-ssl.celtra.com/api//blobs/c904aad187befd5efc122c8ec58071c24eb9a7b7da1b42fd094dc21215dbf408/code_50.png?transform=crush&quality=256";
	$cta_link = "https://www.luluhypermarket.com/en-ae/-grocery/c/HYUAE01";
	$reportLabel = $moment;
}
//set dynamic content ends
//echo "<br>Expiry: " . $_SESSION["endDateTime"];
//echo "<br>Moment: " . $venue."<BR>";
?>
<?php
$response = array();
$response = array(image_300x250=>"$image_300x250", image_300x600=>"$image_300x600", image_970x250=>"$image_970x250", promo_300x250=>"$promo_300x250", promo_300x600=>"$promo_300x600", promo_970x250=>"$promo_970x250", cta_link=>"$cta_link", reportLabel=>"$moment");
//echo json_encode($response);
echo str_replace('</', '<\/', json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
?>