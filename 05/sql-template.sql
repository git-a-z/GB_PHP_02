/*DROP DATABASE IF EXISTS gb_php2_az_sf;
CREATE DATABASE gb_php2_az_sf;
USE gb_php2_az_sf;

DROP TABLE IF EXISTS gb_php2_az_sf.product;
CREATE TABLE gb_php2_az_sf.product (
	id SERIAL PRIMARY KEY,
	title VARCHAR(255) NOT NULL, 
	description LONGTEXT DEFAULT NULL, 
	price DOUBLE PRECISION NOT NULL, 
	image_path VARCHAR(255) NOT NULL, 
	clicks INT UNSIGNED DEFAULT 0
) COMMENT 'Галерея картинок';*/

INSERT INTO gb_php2_az_sf.product (title,price,image_path) VALUES
	('Herald',111.11,'Herald.jpg'),
	('HumptyDumpty',222.22,'HumptyDumpty.jpg'),
	('MadTeaParty',333.33,'MadTeaParty.jpg'),
	('WhiteKnight',444.44,'WhiteKnight.jpg');
