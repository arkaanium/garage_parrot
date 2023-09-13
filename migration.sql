CREATE DATABASE IF NOT EXISTS garage;

USE garage;

CREATE TABLE IF NOT EXISTS 'cars' (
  'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'author' varchar(64) NOT NULL,
  'general_informations' text NOT NULL,
  'vehicle_power' text NOT NULL,
  'consumption' text NOT NULL,
  'warranty' int(11) NOT NULL,
  'options' text NOT NULL,
  'year' int(11) NOT NULL,
  'price' int(11) NOT NULL,
  'kilometers' int(11) NOT NULL,
  'creation_date' varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'images' (
  'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'name' varchar(64) NOT NULL,
  'annonce_id' int(11) NOT NULL,
  'author' varchar(64) NOT NULL,
  'upload_date' varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'messages' (
  'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'author' varchar(64) NOT NULL,
  'subject' varchar(150) NOT NULL,
  'message' text NOT NULL,
  'email' varchar(64) NOT NULL,
  'phone' varchar(20) NOT NULL,
  'creation_date' varchar(64) NOT NULL,
  'status' int(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'reviews' (
  'id' integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'author' varchar(64) NOT NULL,
  'rate' int(11) NOT NULL,
  'subject' varchar(64) NOT NULL,
  'comment' text NOT NULL,
  'status' int(11) NOT NULL,
  'creation_date' varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'settings' (
  'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'services' text NOT NULL,
  'schedule' text NOT NULL,
  'update_date' varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'users' (
  'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'name' varchar(64) NOT NULL,
  'type' varchar(11) NOT NULL,
  'email' varchar(64) NOT NULL,
  'password' varchar(64) NOT NULL,
  'creation_date' varchar(64) NOT NULL
);
