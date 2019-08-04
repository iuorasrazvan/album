# Zend Framework small application

## Introduction


## Web server setup

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

```apache
<VirtualHost *:80>
    ServerName zft.localhost
    DocumentRoot C:/xampp/htdocs/zft/public
    SetEnv APPLICATION_ENV "development"
    <Directory C:/xampp/htdocs/zft/public>
        DirectoryIndex index.php
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

####
run composer install and you are ready to go


```
