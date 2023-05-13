CREATE DATABASE IF NOT EXISTS sovann_data;

USE sovann_data;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  profile_image VARCHAR(255) DEFAULT 'http://localhost/sovann/icon_profile/default_profile.jpg',
  isLogin BOOLEAN DEFAULT false,
  bolden VARCHAR(255)
);
