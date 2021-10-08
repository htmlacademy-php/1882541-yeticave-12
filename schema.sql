SHOW DATABASES;

CREATE DATABASE yeti_cave_db
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE UTF8_GENERAL_CI;


USE yeti_cave_db;




 CREATE TABLE IF NOT EXISTS categories (    /* таблица категорий лотов  */
	category_id INT AUTO_INCREMENT PRIMARY KEY,
	category_name VARCHAR(32) NOT NULL UNIQUE
)



CREATE TABLE IF NOT EXISTS users (  /* таблтица данных пользователей */
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(32) NOT NULL,
	user_password VARCHAR(32) NOT NULL,
	user_email VARCHAR(64) NOT NULL UNIQUE,
	user_contacts VARCHAR(1024) NOT NULL
)



	CREATE TABLE IF NOT EXISTS lots (  /* таблица для лотов */
		lot_id INT AUTO_INCREMENT PRIMARY KEY,
		category_id INT NOT NULL,
		image VARCHAR(128) NOT NULL,
		title VARCHAR(64) NOT NULL,
		description VARCHAR(512) NOT NULL,
		base_price INT NOT NULL,
		step INT NOT NULL,
		end_date DATE NOT NULL
	)
	
	
	CREATE TABLE IF NOT EXISTS bids (    /*  таблица для отображения истории ставок  */
		item_id INT UNIQUE,     
		user_id INT UNIQUE,
		bid_time DATE
	)
	