<?php 
/*
Back-end By  : AlexLanka
Front-end by : BestJobsLK
v.1.03
*/
	//is set submit
	if (isset($_POST['submit'])) {

		$to             = "<Enter Your Email>"; //Your email address
		/*if you want to send email in user inbox change $to = $_POST['email'];*/

		//email subject
        $mail_subject   = 'Contact Message from <Your website> : ' .$_POST['subject'];

        //email body
        $email_body		= '<style type="text/css">
body, html {
      margin: 0px;
      padding: 0px;
      -webkit-font-smoothing: antialiased;
      text-size-adjust: none;
    }
</style><a href=""></a>

<body style="font-family: Arial, Helvetica, sans-serif;
		        margin: 100;"><div style="padding: 8px;text-align: center;background: #0275d8;color: white;"><center><a href="https://alexlanka.com/" target="_blank"><img src="https://alexlanka.com/assets/images/alex-lanka.com_2021-02-14_03-17_42am_logo-web.png" width="300"></a></center></div><div style="background-color:powderblue;padding: 20px;">
				<table>
		        <tr>
		          <td><b>Name</b></td>
		          <td>:</td>
		          <td>'.$_POST['fullname'].'</td>
		        </tr>
		        <tr>
		          <td><b>From</b></td>
		          <td>:</td>
		          <td>'.$_POST['email'].'</td>
		        </tr>
		        <tr>
		          <td><b>Subject</b></td>
		          <td>:</td>
		          <td>'.$_POST['subject'].'</td>
		        </tr>
		      </table>
		      </div>

		      <div style="background-color:#C0C0C0;padding: 20px;">

		      '.nl2br(strip_tags($_POST['message'])).'

		      </div><div style="padding: 10px;text-align: center;background: #0275d8;"><p style="color: #FFFFFF;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></p></div></body>';//HTML5 

        $header        	= "From: {$_POST['email']}\r\nContent-Type: text/html;";
        $send_mail_result = mail($to, $mail_subject, $email_body, $header);


		if ($send_mail_result) {
			$status = '<p class="success">Message Sent Successfully.</p>';
		} else {
			$status = '<p class="error">Error: Message Was Not Sent.</p>';
		}

	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Us</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<h1>Contact Us</h1>
		<?php if (isset($status)) {
			echo $status;
		} ?>
		<form method="post">
			<p>
				<label for="fullname">Full Name *:</label>
				<input type="text" name="fullname" id="fullname" required>
			</p>

			<p>
				<label for="email">Email *:</label>
				<input type="email" name="email" id="email" required>
			</p>

			<p>
				<label for="subject">Subject *:</label>
				<input type="text" name="subject" id="subject" required>
			</p>

			<p>
				<label for="message">Message *: </label>
				<textarea name="message" id="message" cols="30" rows="10" required></textarea>
			</p>
			<p>
				<button type="submit" name="submit">Send Message</button>
			</p>


		</form>

	</div>
</body>
</html>