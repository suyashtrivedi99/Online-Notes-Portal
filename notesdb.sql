/* Creating Tables */

CREATE TABLE  `users` 
(    
   `user_id` INT NOT NULL AUTO_INCREMENT ,
   `username` VARCHAR( 50 ) ,
   `email` VARCHAR( 50 ) ,
   `password` VARCHAR( 30 ) ,
   `activation` CHAR( 32 ) ,
   PRIMARY KEY `user_id`(`user_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE  `rememberme` 
(    
   `id` INT NOT NULL AUTO_INCREMENT ,
   `authenticator1` CHAR( 12 ) ,
   `f2authenticator2` CHAR( 64 ) ,
   `user_id` INT ,
   `expires` DATETIME ,
   PRIMARY KEY `id`(`id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE  `forgotpassword` 
(    
   `id` INT NOT NULL AUTO_INCREMENT ,
   `user_id` INT ,
   `key` CHAR( 32 ) ,
   `time` INT ,
   `status` VARCHAR( 7 ) ,
   PRIMARY KEY `id`(`id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;
