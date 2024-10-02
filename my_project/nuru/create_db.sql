CREATE DATABASE mydb;

USE mydb;

CREATE TABLE student (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(100) UNIQUE
);

INSERT INTO student (name, email)
VALUES
    ('Student 1', 'email1@gmail.com'),
    ('Student 2', 'email2@gmail.com'),
    ('Student 3', 'email3@gmail.com');

Query OK, 3 rows affected (0.02 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql>
