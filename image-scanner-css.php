<?php
# File:            image-scanner-css.php   
# Current Ver:     
# Function:       
# Author:          Brandon Plentl (bp)
# Environment:     PhpStorm - Windows 10
# Code Cleaned:   
# Code Validated: 
# Notes:          
# Fixes Needed:	  
# Revisions:      



$array_ignored_files = array(
    ".",
    "..",
    basename(__FILE__)
);

function cssDump ($Fullname, $height,$ctr) {

    echo "#orig-img-" . $ctr ." {" . "\n";
    echo "\t"."background-image: url('/wp-content/uploads/2017/originals/" . $Fullname . "');" . "\n";
    echo "\t"."height: " . $height . "px;" . "\n";
	echo "}" . "\n";

}
echo "<style type='text/css'>"."\n";
$ctr=1;
$DocDirectory = "./.";   //Directory to be scanned
$arrDocs = array_diff(scandir($DocDirectory), array('..', '.'));  //Scan the $DocDirectory and create an array list of all of the files and directories
natcasesort($arrDocs);
if( isset($arrDocs) && is_array($arrDocs) )
{
    foreach( $arrDocs as $a )   //For each document in the current document array
    {
        $fileName = pathinfo( $a, PATHINFO_FILENAME );
        $fileExt = pathinfo($a, PATHINFO_EXTENSION);
        $newFileExt = "png";

        // Directory search and count
        if( is_file($DocDirectory . "/" . $a) && !in_array($a,$array_ignored_files) && substr($a,strlen($a)-3,3) != ".db" && pathinfo($a, PATHINFO_EXTENSION) == "png")      //The "." and ".." are directories.  "." is the current and ".." is the parent
        {
            $Fullname = $fileName . '.' . $fileExt;

            list($width, $height, $type, $attr) = getimagesize($Fullname);

            cssDump($Fullname,$height,$ctr);

            $ctr++;
        }
    }
}
echo "</style>";
echo "\n\n";

$ctr=1;
if( isset($arrDocs) && is_array($arrDocs) )
{
    foreach( $arrDocs as $a )   //For each document in the current document array
    {
        $fileName = pathinfo( $a, PATHINFO_FILENAME );
        $fileExt = pathinfo($a, PATHINFO_EXTENSION);
        $newFileExt = "png";

        // Directory search and count
        if( is_file($DocDirectory . "/" . $a) && !in_array($a,$array_ignored_files) && substr($a,strlen($a)-3,3) != ".db" && pathinfo($a, PATHINFO_EXTENSION) == "png")      //The "." and ".." are directories.  "." is the current and ".." is the parent
        {
            echo "<div id='op-img-" .$ctr. " class='basic-image full-width-image'></div>" . "\n";

            $ctr++;
        }
    }
}