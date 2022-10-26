CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  email VARCHAR(40) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users (name, email, password)
SELECT * FROM (SELECT 'Alex', 'alexrover99@gmail.com', '$apr1$vflk5m19$A3E.TD96RdTVpvN8jb5iT0') AS tmp 
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Alex' AND email = 'alexrover99@gmail.com' AND password = '$apr1$vflk5m19$A3E.TD96RdTVpvN8jb5iT0'
) LIMIT 1;

INSERT INTO users (name, email, password)
SELECT * FROM (SELECT 'Bob', 'bobMarley123@mail.ru', '$apr1$y2wup1rx$wXMkgkMi9XN5jNepGqyaK.') AS tmp 
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Bob' AND email = 'bobMarley123@mail.ru' AND password = '$apr1$y2wup1rx$wXMkgkMi9XN5jNepGqyaK.'
) LIMIT 1;


CREATE TABLE IF NOT EXISTS auth (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO auth (username, password)
SELECT * FROM (SELECT 'admin', '$apr1$3znxlsmt$ei/0M71d51yk7ZvlNu.7p/') AS tmp
WHERE NOT EXISTS (
    SELECT username FROM auth WHERE username = 'admin' AND password = '$apr1$3znxlsmt$ei/0M71d51yk7ZvlNu.7p/'
) LIMIT 1;

CREATE TABLE IF NOT EXISTS product (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    price INT(32) NOT NULL,
    url_to_photo VARCHAR(256) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO product (name, price, url_to_photo)
SELECT * FROM (SELECT 'constructor', 1000, '/images/constructor.jpg') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM product WHERE name = 'constructor' AND price = 1000 AND url_to_photo = '/images/constructor.jpg'
) LIMIT 1;

INSERT INTO product (name, price, url_to_photo)
SELECT * FROM (SELECT 'toy', 400, '/images/deer.jpg') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM product WHERE name = 'toy' AND price = 400 AND url_to_photo = '/images/deer.jpg'
) LIMIT 1;

INSERT INTO product (name, price, url_to_photo)
SELECT * FROM (SELECT 'robot', 1200, '/images/dog.jpg') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM product WHERE name = 'robot' AND price = 1200 AND url_to_photo = '/images/dog.jpg'
) LIMIT 1;