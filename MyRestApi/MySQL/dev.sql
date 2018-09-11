CREATE DATABASE user_db;
 
USE user_db;
 
CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(250) DEFAULT NULL,
  email varchar(255) NOT NULL,
  password_hash text NOT NULL,
  pos varchar(250) NOT NULL,
  api_key varchar(32) NOT NULL,
  status int(1) NOT NULL DEFAULT '1',
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
);