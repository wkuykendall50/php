<?php
if (isset($_POST['submit'])){
$myfile = fopen($filename, "a+") or die ("Somthing is very wrong here");
$data = $_POST['data'] . "\n";
fwrite($myfile,$data);
}
?>

<?php
$folder = "Files/" ;
$filelist = scandir($folder);
foreach ($filelist as $val){
	echo $val;
	echo "<br>";
}
?>



<form method = "post" action = "fileappend.php">
File : <select name ="filename">
<?php
$folder = "Files/" ;
$filelist = scandir($folder);
foreach ($filelist as $val){
	echo "<option value = '$val'>$val</option>";

}
?>
<select> 
<br />
Data: <input type = "text" name= "data">
<br>
<input type = "submit" name = "submit" value = "submit">
</form>