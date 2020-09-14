# SpiderDevOpsTask3
**Basic task**

1.Setup LAMP stack

2.To create tables and database
    cd to /var/www/html/
    
   a)To create database, run
   ```php db.php```
   
   b)To create the tables, run
   ```php tables.php```
   
  3.Open http://localhost/register.html to register for the chatting app
  
  4.There will be redirection link after successful registeration (Following specify rules provided in website)
  
  5.Enter valid login details(Added remember me with cookies) , if provided correctly you will be redirected to dashboard where you can chat with different people
  
  **Hacker mode**
  
  1.Added regex conditions to check for conditions in username and password
  
  2.Added mysqli_real_escape_string() to prevent sql injection
