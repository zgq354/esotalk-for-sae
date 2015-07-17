<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

if (!defined("IN_ESOTALK")) exit;

/**
 * Displays the settings form for the Proto skin.
 *
 * @package esoTalk
 */

$form = $data["BanemailSettingsForm"];
?>
<?php echo $form->open(); ?>

<div class='section'>

<ul class='form'>

<li>
<label><?php echo T("Email Address"); ?></label>
<?php echo $form->input("emails", "text"); ?><br/>
Use <b>comma (,)</b> for multiple email address.<br/>
Example : yopmail.fr,163.com,115mail.net,trash-mail.com
</li>

</ul>

</div>

<div class='buttons'>
<?php echo $form->saveButton("BanEmailSave"); ?>
</div>

<?php echo $form->close(); ?>
