DROP DATABASE IF EXISTS finance_db;
DROP USER IF EXISTS 'sqladmin'@'%';
FLUSH PRIVILEGES;

CREATE DATABASE finance_db;
CREATE USER 'sqladmin'@'%' IDENTIFIED BY 'secretpassword';
GRANT ALL PRIVILEGES ON finance_db.* TO 'sqladmin'@'%';
FLUSH PRIVILEGES;

USE finance_db;

CREATE TABLE `users` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) engine=InnoDB default charset=latin1;

INSERT INTO `users` (`username`,`password`) VALUES ('Hubert J. Farnsworth','professor');
INSERT INTO `users` (`username`,`password`) VALUES ('Philip J. Fry','fry');
INSERT INTO `users` (`username`,`password`) VALUES ('John A. Zoidberg','zoidberg');
INSERT INTO `users` (`username`,`password`) VALUES ('Hermes Conrad','hermes');
INSERT INTO `users` (`username`,`password`) VALUES ('Turanga Leela','leela');
INSERT INTO `users` (`username`,`password`) VALUES ('Bender Bending Rodriguez','bender');
INSERT INTO `users` (`username`,`password`) VALUES ('Amy Wong','amy');


