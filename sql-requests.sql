-- SQL REQUEST WHICH I USED;

-- The first one is create database
CREATE DATABASE `test`;

-- then I created a tables and made relationships between them

-- .1 create users table
CREATE TABLE `users` (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(20) NOT NULL
);

--  2. create posts table with foreign key
use users;

CREATE TABLE `posts` (
	userId INT NOT NULL,
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    body VARCHAR(500) NOT NULL,
    FOREIGN KEY(userId) REFERENCES users(id)
);

-- 3. create comments table with foreign key

use posts;

CREATE TABLE `comments` (
	postId INT NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL, 
    email VARCHAR(100) NOT NULL,
    body VARCHAR(500) NOT NULL,
    FOREIGN KEY(postId) REFERENCES posts(id)
);