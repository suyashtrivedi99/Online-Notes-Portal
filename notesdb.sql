/* Creating Tables */

CREATE TABLE  `users` 
(    
   `user_id` INT NOT NULL AUTO_INCREMENT ,
   `username` VARCHAR( 50 ) ,
   `email` VARCHAR( 50 ) ,
   `password` VARCHAR( 30 ) ,
   PRIMARY KEY `user_id`(`user_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `notes`
( 
   `id` INT NOT NULL AUTO_INCREMENT ,
   `user_id` INT NOT NULL ,
   `note` TEXT NOT NULL ,
   `time` INT NOT NULL ,
   PRIMARY KEY (`id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;