<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

if (!defined("IN_ESOTALK")) exit;

/**
 * Default master view. Displays a HTML template with a header and footer.
 *
 * @package esoTalk
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='<?php echo T("charset", "utf-8"); ?>'>
<title><?php echo sanitizeHTML($data["pageTitle"]); ?></title>
<?php echo $data["head"]; ?>
<link rel="icon" type="image/png" href="<?php echo getResource("core/skin/favicon.png");?>">		+v<link rel="apple-touch-icon" href="<?php echo getResource("core/skin/apple-touch-icon.png");?>">
<link rel="apple-touch-icon" href="<?php echo getResource("core/skin/apple-touch-icon.png");?>">
</head>

<body class='<?php echo $data["bodyClass"]; ?>'>
<?php $this->trigger("pageStart"); ?>

<div id='messages'>
<?php foreach ($data["messages"] as $message): ?>
<div class='messageWrapper'>
<div class='message <?php echo $message["className"]; ?>' data-id='<?php echo @$message["id"]; ?>'><?php echo $message["message"]; ?></div>
</div>
<?php endforeach; ?>
</div>

<div id='wrapper'>

<!-- HEADER -->
<div id='hdr'>
<div id='hdr-content'>

<div id='hdr-inner'>

<?php if ($data["backButton"]): ?>
<a href='<?php echo $data["backButton"]["url"]; ?>' id='backButton' title='<?php echo T("Back to {$data["backButton"]["type"]}"); ?>'><i class="icon-chevron-left"></i></a>
<?php endif; ?>

<h1 id='forumTitle'><a href='<?php echo URL(""); ?>'><?php echo $data["forumTitle"]; ?></a></h1>

<ul id='mainMenu' class='menu'>
<?php if (!empty($data["mainMenuItems"])) echo $data["mainMenuItems"]; ?>
</ul>

<ul id='userMenu' class='menu'>
<?php echo $data["userMenuItems"]; ?>
<li><a href='<?php echo URL("conversation/start"); ?>' class='link-newConversation button'><?php echo T("New Conversation"); ?></a></li>
</ul>

</div>
</div>
</div>

<!-- BODY -->
<div id='body'>
<div id='body-content'>
<?php echo $data["content"]; ?>
</div>
</div>

<!-- FOOTER -->
<div id='ftr'>
<div id='ftr-content'>
<ul class='menu'>
<li id='goToTop'><a href='#'><?php echo T("Go to top"); ?></a></li>
<?php echo $data["metaMenuItems"]; ?>
    <?php if (!empty($data["statisticsMenuItems"])) echo $data["statisticsMenuItems"]; ?> <?php $etime=microtime(true);$total=floor(($etime-PAGE_START_TIME)*1000)/1000;echo "{$total}s,"; ?> <?php $query = ET::$database->queries;$query = count($query);echo $query;?> sql queries
      <script language="javascript" type="text/javascript">
//https://gist.github.com/1326893https://gist.github.com/1326893
//20120511 Geovin Du 塗聚文
function calcTime(city, offset) {
var d = new Date();
utc = d.getTime() + (d.getTimezoneOffset() * 60000);
var nd = new Date(utc + (3600000 * offset));
var gmtTime = new Date(utc)
var day = nd.getDate();
var month = nd.getMonth();
var year = nd.getYear();
var hr = nd.getHours(); //+ offset
var min = nd.getMinutes();
var sec = nd.getSeconds();
if(year < 1000){
year += 1900
}
var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August",
"September", "October", "November", "December")
var monthDays = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31")
if (year%4 == 0){
monthDays = new Array("31", "29", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31")
}
if(year%100 == 0 && year%400 != 0){
monthDays = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31")
}
if (hr >= 24){
hr = hr-24
day -= -1
}
if (hr < 0){
hr -= -24
day -= 1
}
if (hr < 10){
hr = " " + hr
}
if (min < 10){
min = "0" + min
}
if (sec < 10){
sec = "0" + sec
}
if (day <= 0){
if (month == 0){
month = 11
year -= 1
}
else{
month = month -1
}
day = monthDays[month]
}
if(day > monthDays[month]){
day = 1
if(month == 11){
month = 0
year -= -1
}
else{
month -= -1
}
}
return city + hr + ":" + min
//return "The local time in " + city + " is " + nd.toLocaleString()+;
}
function worldClockZone(){
document.getElementById('localutc').innerHTML = calcTime('UTC', '-0');
document.getElementById('LAX').innerHTML = calcTime('LAX', '-7');
document.getElementById('PVG').innerHTML = calcTime('PVG ', '+8');
document.getElementById('JFK').innerHTML = calcTime('JFK', '-4');
setTimeout("worldClockZone()", 1000)
}
window.onload=worldClockZone;
</script>
<span id="localutc"></span> · <span id="LAX"></span> ·  <span id="PVG"></span> · <span id="JFK"></span>
</ul>
</div>
</div>
<?php $this->trigger("pageEnd"); ?>

</div>

</body>
</html>
