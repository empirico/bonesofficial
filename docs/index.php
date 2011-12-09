<?php
$dirname = ".";
$dir = opendir($dirname);
while(false != ($file = readdir($dir)))
{
	if(($file != ".") and ($file != ".."))
	{
		echo("<a href='$file'>$file</a> <br />");
	}
}
