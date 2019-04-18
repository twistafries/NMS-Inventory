Not too many subfolders, please.

Branch first and make edits on your branches. 

Only push and merge when your work is meant for 
merging or is final.

Hosting laravel project:

Requirements:
	must install php version 5 and above (prefer 7.*.*)
  	must install composer
	must install laravel 5.6 or above using composer
 	must intall wamp or xamp

Using cmd Create a laravel project using the command "composer create-project laravel/laravel project"
from the folder "C:\Users\<Username>\project" copy the "vendor" folder in the root folder of the findITWebsite project.
  
HOSTING STEPS:
1.) Edit the httpd-vhost.conf in the location "C:\xampp\apache\conf\extra\httpd-vhost.conf" or "C:\wamp\bin\Apache#.#.#\conf\httpd.conf" and add the directory of the project. Example below:
        <VirtualHost 127.0.0.1:80>
            DocumentRoot "D:\IT Project 1\NMS-Inventory-lovelyn\finditwebsite\public"
            DirectoryIndex index.php      
            <Directory "D:/IT Project 1/NMS-Inventory-lovelyn/finditwebsite/public">
                Options Indexes FollowSymLinks MultiViews
                AllowOverride all
                Order Deny,Allow
                Allow from all
                Require all granted
            </Directory>
        </VirtualHost>
2.) Edit hosts file in the "C:\Windows\System32\drivers\etc\host" and add your localhost and alias.

	
