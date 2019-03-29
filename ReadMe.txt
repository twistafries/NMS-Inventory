Not too many subfolders, please.

Branch first and make edits on your branches. 

Only push and merge when your work is meant for 
merging or is final.

Hosting laravel project:

Requirements:
	php version 5 and above (prefer 7.*.*)
  composer
	laravel 5.6 or above
  wamp or xamp
  the laravel project with vendor folder and .env file
  generated key using the command php artisan generate:key (in the root folder of the project)
  database
STEPS:
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

	
