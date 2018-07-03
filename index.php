<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Sandbox</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
        <h1>Welcome to the Sandbox</h1>
        <div class="container-fluid">
            <ul class="list-unstyled">
            <?php
            $DocDirectory = "./.";   //Directory to be scanned

            $arrDocs = array_diff(scandir($DocDirectory), array('..', '.'));  //Scan the $DocDirectory and create an array list of all of the files and directories
            natcasesort($arrDocs);
            if( isset($arrDocs) && is_array($arrDocs) )
            {
                foreach( $arrDocs as $a )   //For each document in the current document array
                {
                    // Directory search and count
                    if( is_dir($DocDirectory . "/" . $a) && $a != "." && $a != ".." && substr($a,strlen($a)-3,3) != ".db" )      //The "." and ".." are directories.  "." is the current and ".." is the parent
                    {
                        echo "<li><a href='/" . $a . "' class=''>" . $a . "</a>" . "<br /></li>";
                    }
                }

                foreach( $arrDocs as $a )   //For each document in the current document array
                {
                    // Directory search and count
                    if( is_file($DocDirectory . "/" . $a) && $a != "." && $a != ".." && substr($a,strlen($a)-3,3) != ".db" )      //The "." and ".." are directories.  "." is the current and ".." is the parent
                    {
                        echo "<li><a href='/" . $a . "' class=''> - " . $a . "</a>" . "<br /></li>";
                    }
                }
            }

            ?>
            </ul>
        </div>
	</body>
</html>