<?php
//sets up the database connection
require("lsconnection.php");
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//Capturing the POST Data
$username = $_POST['username'];
$password = $_POST['password'];

// Creating the SQL statement
$sql = "SELECT password FROM users WHERE username = '$username' LIMIT 1;;";

// Executing the SQL statement
$result = $conn->query($sql);

//Extracting the record and storing the hash
while ($row = $result->fetch_assoc()){
	$hash = $row['password'];
}

//Verifying the password to the hash in the database
if (password_verify($password, $hash)){
$_SESSION['username'] = $username;
header('Location: http://wkuykendall50.net/lsfirst.php');
} else {
  echo "Epic Fail";
}
$conn->close();
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
User Name: <input type="text" name="username"><br />
Password: <input type="text" name="password"><br />
<input type="submit" value="submit">
</form>
</body>
</html>