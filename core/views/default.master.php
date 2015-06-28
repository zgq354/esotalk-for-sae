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
<link href="<?php echo getResource("core/skin/favicon.ico");?>" type="image/x-icon" rel="shortcut icon">
 <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="<?php echo getResource("core/skin/favicon.png");?>">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="<?php echo sanitizeHTML($data["pageTitle"]); ?>"/>
  <link rel="apple-touch-icon-precomposed" href="<?php echo getResource("core/skin/favicon.png");?>">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="<?php echo getResource("core/skin/favicon.png");?>">
  <meta name="msapplication-TileColor" content="#0e90d2">

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
</ul>
</div>
</div>
<?php $this->trigger("pageEnd"); ?>

</div>

</body>
</html>
