<?php
    // This variable grabs the argument(value) from the url at ?ip=[value]
    $ip=$_GET["ip"];

    // Filename is hostname, r stands for read
    $myfile  = fopen("hostname", "r") or die ("Unable to open 'hostname' file!");
    // Counter for the for loop for number of items in the file
    $files = filesize("hostname");

    // Count number of strings from the files variable (counts based on whitespaces)
    $stringNum = strlen($files);

    // Closes the file
    fclose($myfile);

    // Grabs the content in the 'hostname' file
    $hostname_contents = file_get_contents("hostname");

    // Greps the file matches witht he ip address specified
    preg_match_all("|(.*$ip.*)|", $hostname_contents, $out, PREG_PATTERN_ORDER); 

    // Puts all the words in the array
    $cron_log_array = $out[0];

    // Grabs the founded string in the array and transfers it to a string variable
    $ip_line = $cron_log_array[0];

    // Makes that string in array
    $arr = explode(" ", trim($ip_line));

    // Outputs the first string in that line
    echo $arr[0];
?>
