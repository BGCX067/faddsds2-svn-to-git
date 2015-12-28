<?php
	/******************************************************************************
     * Desertion: This script allows you to revive feedback/message from you visitors.
	 * Use this script to add a email or contact form on your website.
	 * The script comes with two files email_form.html, email_form_process.php, Prototype JS lib and install.txt
	 * Usage: You're not allowed to redistribute or sell this script under your name.
	 * However, you are allowed to modify this script for your own personal use.
	 
	 * Please see install.txt attached in the zip for install instructions.

	 * author: webdev
	 * Visit www.php-learn-it.com for more script and tutorials on PHP.
	 
	 * Like to modify this script to use on your website? 
	 * Email me at phplearnit@gmail.com for help.
	 *****************************************************************************/


	$to = "jun.kombest@googlemail.com";
	$subject = "公司: ".$_POST["name"].", 电话: ".$_POST["telephone"];
	
	//minimum characters allowed in the message box
	$msg_min_chars = "0";

	//maximum characters allowed in the message box
	$msg_max_chars = "250";

	function validate_form_items()
	{
	   global $msg_min_chars, $msg_max_chars;
	   $msg_chars = "{".$msg_min_chars.",".$msg_max_chars."}";

	   $form_items = array(
		   
		   "name"  => array(
						   "regex" => "/^([a-zA-Z '-]+)$/",
						   "error" => "Name appears to be in inproper format",
						   ),
			"email" => array(
						   "regex" =>
							"/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/",
						   "error" => "Please enter your valid email address",
						   ),
		   "message" => array(
						   "regex" => "/^.{$msg_chars}$/",
						   "error" => "Your message is either too short or exceeds $msg_max_chars characters",
						   ),
	   );

	   $errors = array();

	   foreach($form_items as $item_name => $item_props)
	   {
		   if (!preg_match($item_props["regex"], trim($_POST[$item_name])))
		   {
				   $errors[] = $item_props["error"];
		   }
	   }

	   return $errors;
	}
	
	function email($from, $to, $subject, $message)
	{
		$headers = "From: ".$from."\r\n";
		$headers .= "Reply-To: ".$from."\r\n";
		$headers .= "Return-Path: ".$from."\r\n";

		if (mail($to,$subject,$message,$headers) ) {
			echo "Thanks for your inquiry. Your message was received. <br>We will get back to your shortly.";
		} else {
			echo "Your message could not be sent at this time. Please try again.";
		}
	}

	function print_error($errors)
	{
		foreach($errors as $error)
		{
			echo $error."<br>";
		}
	}
	
	function form_process()
	{	
		global $to, $subject;

		//$errors = validate_form_items();
		
		if(count($errors) == 0)
		{
			$errors [] = email(trim($_POST["email"]), $to, $subject, $_POST["messages"]);
		}
		
		print_error($errors);
	}
	
	form_process();

?>