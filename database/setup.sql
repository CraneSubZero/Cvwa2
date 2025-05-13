-- CVWA2 Database Setup Script

CREATE DATABASE IF NOT EXISTS cvwa2;
USE cvwa2;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    user VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

INSERT INTO users (first_name, last_name, user, password) VALUES
('Alice', 'Anderson', 'alice', 'password1'),
('Bob', 'Brown', 'bob', 'password2'),
('Charlie', 'Clark', 'charlie', 'password3'),
('Diana', 'Dawson', 'diana', 'password4'),
('Eve', 'Evans', 'eve', 'password5'); 