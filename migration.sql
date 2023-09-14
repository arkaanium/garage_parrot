CREATE DATABASE IF NOT EXISTS garage;

USE garage;

CREATE TABLE IF NOT EXISTS cars (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author varchar(64) NOT NULL,
  general_informations text NOT NULL,
  vehicle_power text NOT NULL,
  consumption text NOT NULL,
  warranty integer NOT NULL,
  options text NOT NULL,
  year integer NOT NULL,
  price integer NOT NULL,
  kilometers integer NOT NULL,
  creation_date varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS images (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(64) NOT NULL,
  annonce_id integer NOT NULL,
  author varchar(64) NOT NULL,
  upload_date varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS messages (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author varchar(64) NOT NULL,
  subject varchar(150) NOT NULL,
  message text NOT NULL,
  email varchar(64) NOT NULL,
  phone varchar(20) NOT NULL,
  creation_date varchar(64) NOT NULL,
  status integer NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author varchar(64) NOT NULL,
  rate integer NOT NULL,
  subject varchar(64) NOT NULL,
  comment text NOT NULL,
  status integer NOT NULL,
  creation_date varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS settings (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  services text NOT NULL,
  schedule text NOT NULL,
  update_date varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(64) NOT NULL,
  type varchar(11) NOT NULL,
  email varchar(64) NOT NULL,
  password varchar(64) NOT NULL,
  creation_date varchar(64) NOT NULL
);
