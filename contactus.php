<?php   
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'portfolio');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
if((isset($_POST['name']) && !empty($_POST['name']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['subject']) && !empty($_POST['subject']))
&& (isset($_POST['message']) && !empty($_POST['message']))){

	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Subject = $_POST['Subject'];
	$Message = $_POST['Message'];
	
	$to = "monu.agrawal2019@vitstudent.ac.in";
	$headers = "From : " . $email;
	
	if( mail($to, $subject, $message, $headers)){
		echo "E-Mail Sent successfully, we will get back to you soon.";
		
		$query = "INSERT INTO `details` ('Name', 'Email', 'Subject', 'Message','timestamp') VALUES ('$Name', '$Email', '$Subject', '$Message')";
		$result = mysqli_query($connection, $query);
        header('index.html');
	}
}

?>