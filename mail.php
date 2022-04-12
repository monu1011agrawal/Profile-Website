<?php 


$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$Name = trim($_POST["Name"]);
	$Email  = trim($_POST["Email"]);
	$Subject = trim($_POST["Subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "Name" && $key != "Email" && $key != "Subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f3f3f3;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid; width: 100px;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
}
} else if ( $method === 'GET' ) {

	$Name = trim($_GET["Name"]);
	$Email  = trim($_GET["Email"]);
	$Subject = trim($_GET["Subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "Name" && $key != "Email" && $key != "Subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f3f3f3;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid; width: 100px;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($Name).' <'.$Email.'>' . PHP_EOL .
'Reply-To: '.$Email.'' . PHP_EOL;

mail($Email, adopt($Subject), $message, $headers );
