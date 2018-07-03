<?php


//This is a bug fix. It will need to be merged into master
$ch = curl_init("http://www.gamestop.com/xbox-360/games/crysis-2/75106");
$fp = fopen("test2.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
// The CURLOPT_HTTPHEADER is used to emulate that this is a browser request
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") );
curl_exec($ch);
$info = curl_getinfo($ch);
echo 'Took ' . $info['total_time'] . ' seconds to download' . "\n";

curl_close($ch);
fclose($fp);

$file = 'test2.txt';
$searchfor = 'CI_PreOwnedPrice';

// the following line prevents the browser from parsing this as HTML.
header('Content-Type: text/plain');

// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);

// escape special characters in the query
$pattern = preg_quote($searchfor, '/');

// finalize the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
echo $pattern.PHP_EOL;
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $contents, $matches)){
   echo "Found matches:\n";
   echo implode("\n", $matches[0]);
} else {
   echo "No matches found";
}

?>
