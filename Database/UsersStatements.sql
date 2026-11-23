/* SQL is somewhat more intuitive (for me) than some of the coding languages used so far */

/* this creates a SQL database named vocality (if it exists already, it does nothing) */
CREATE DATABASE IF NOT EXISTS vocality;

/* Tells my SQL to open vocality database and apply the following commands */
USE vocality;

/* makes a table to store user account info*/
CREATE TABLE IF NOT EXISTS users (
    
    -- generates a number that acts as the main identifier for each user and counts up by itself when another user is added --
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- stores text up to 255 characters, not null and unique basically means it can't be empty and no repeats --
    email VARCHAR(255) NOT NULL UNIQUE,
    -- will store the hash that can be up to 255 characters and can't be empty --
    password_hash VARCHAR(255) NOT NULL,
    -- stores the time the user or row in the table has been created --
    time_creates TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
/*
CREATE USER IF NOT EXISTS 'jester_admin'@'192.168.112.%' IDENTIFIED BY 'V0c@l1ty!J3st3r#99';
(for VM, testing host as of now)
*/
/* making a user to enforce least-priveledge. mySQL creates a root account for the database by default*/
CREATE USER IF NOT EXISTS 'jester_admin'@'192.168.112.20' IDENTIFIED BY 'V0c@l1ty!J3st3r#99';

GRANT SELECT, INSERT, UPDATE, DELETE ON vocality.* TO 'jester_admin'@'192.168.112.20';
