<?php
//Opening the acronyms.txt files as read only
$myfile = fopen ("Files/acronyms.txt","r") or die("Can't open file");
//Determining the total size of the file in bytes
$myfilelength = filesize("Files/acronyms.txt");
//reading in the file and echoing it to the screen
echo fread($myfile, $myfilelength);
//closing the file connection
fclose($myfile);

echo "<hr>";

//Opening the acronyms.txt files as read only
$myfile = fopen ("Files/acronyms.txt","r") or die("Can't open file");
//read the first line of text
echo fgets($myfile);
//closing the file connection
fclose($myfile);

echo "<hr>";

//Opening the acronyms.txt files as read only
$myfile = fopen ("Files/acronyms.txt","r") or die("Can't open file");
//Loop until the end of file
while (!feof($myfile)) {
	echo fgets($myfile). "<hr>";
}
//closing the file connection
fclose($myfile);

?>