<?php
//sets up the database connection
require("lsconnection.php");
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>
<body>
<?php
// Checks to see if we have POST DATA 
if (!empty($_POST)) {
//check to make sure username has something in it
if (empty($_POST['username'])) {
die ("You did not enter a username");	
}
// check to make sure password has something in it
if (empty($_POST['password'])) {
die("You did not enter a password");	
}
//Check to make sure email is valid
if (!filter_var($_POST['email'])) {
die ("You did not enter a valid email");
}
//Capturing the POST Data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
//checking for duplicate usernames
$sql= "SELECT username FROM users WHERE username = '$username';";
$result = $conn->query($sql);
if (mysqli_num_rows($result) != 0 ) {
	die("Username already exists");
}
//checking for duplicate emails
$sql= "SELECT email FROM users WHERE email = '$email;'";
$result = $conn->query($sql);
if (mysqli_num_rows($result) != 0 ) {
	die("Email already exists");
}
// Hash and salt password with bcrypt
$hash = password_hash($password, PASSWORD_BCRYPT);
//Creating the sql statement
$sql = "INSERT INTO users (firstname, lastname, email, username, password)
Values ('firstname', 'lastname', '$email', '$username', '$hash');";
// Executing the SQL statement
if ($conn->query($sql) === TRUE) {
	echo "Record added sucessfully";
} else {
	echo "Error: " . $sql . "" . $conn->error;
}
$conn->close();
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
First Name: <input type="text" name="firstname"><br />
Last Name: <input type="text" name="lastname"><br />
Email Address: <input type="text" name="email"><br />
User Name: <input type="text" name="username"><br />
Password: <input type="text" name="password"><br />
<input type="submit" value="submit">
</form>
</body>
</html>