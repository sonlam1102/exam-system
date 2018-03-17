# Info #
Language: PHP    
Framework: Laravel 5.6    
Developer: Son T. Luu    

# Set up #
Follow the configuration steps in Laravel Doc    
Set up the database:   
##* Case 1: having database in server * ##  
- Simply add the host ip, port, username and password to the .env file      

##* Case 2: run on local host with docker *##   
- Enable the db block in *docker-compose.yml.example*  
- Download, set up and run docker    
- Run the yml file (making .yml file by remove .example) docker-compose -f docker-compose.yml up    
- Type: docker ps     
- Find the mysql container and copy its id     
- Type: docker exec -it <mysql_container_id> cat /etc/host (this is to show the mysql's ip of the mysql container from docker)    
- Get the database IP, port is 3306    
- Fill those below in the .env file      
- *to quit docker, type: docker stop <container id>     
- *to quit all docker's processes, type: docker stop $(docker ps -aq)     

##* Connect to mysql command *##     
- mysql -u <username> -p <optional: db name>         
Enter password then login the mysql server     

##* Export from mysql server to file command *##     
- mysqldump -u <username> -p <database name> > <name of export file>.sql         
Enter password then login the mysql server

##* First setting for laravel *##
- run composer update
- Make .env file
- php artisan key:generate
- Enjoy