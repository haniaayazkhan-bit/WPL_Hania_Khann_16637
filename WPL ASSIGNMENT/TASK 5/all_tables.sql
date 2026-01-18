USE signup_db;

CREATE TABLE x_users (
  id INT AUTO_INCREMENT,
  fullname VARCHAR(100),
  email VARCHAR(255),
  username VARCHAR(100),
  password VARCHAR(255),
  dob VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE facebook_users (
  id INT AUTO_INCREMENT,
  firstname VARCHAR(100),
  surname VARCHAR(100),
  email VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE instagram_users (
  id INT AUTO_INCREMENT,
  email VARCHAR(255),
  fullname VARCHAR(100),
  username VARCHAR(100),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE snapchat_users (
  id INT AUTO_INCREMENT,
  firstname VARCHAR(100),
  lastname VARCHAR(100),
  email VARCHAR(255),
  username VARCHAR(100),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE linkedin_users (
  id INT AUTO_INCREMENT,
  fullname VARCHAR(100),
  email VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);
