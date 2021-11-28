DROP DATABASE IF EXISTS gb_php_az;
CREATE DATABASE gb_php_az;
USE gb_php_az;

DROP TABLE IF EXISTS gb_php_az.image_gallery;
CREATE TABLE gb_php_az.image_gallery (
	id SERIAL PRIMARY KEY,
	imagePath VARCHAR(255) NOT NULL,
	clicks INT UNSIGNED DEFAULT 0
) COMMENT 'Галерея картинок';

INSERT INTO gb_php_az.image_gallery (imagePath) VALUES
	('img/Herald.jpg'),
	('img/HumptyDumpty.jpg'),
	('img/MadTeaParty.jpg'),
	('img/WhiteKnight.jpg');