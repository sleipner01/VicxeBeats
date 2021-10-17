CREATE TABLE users (
userId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
fName TINYTEXT NOT NULL,
sName TINYTEXT NOT NULL,
email TINYTEXT NOT NULL,
userPassword LONGTEXT NOT NULL
);

CREATE TABLE admins (
userId int NOT NULL,
isAdmin bit not null,
FOREIGN KEY (userId) REFERENCES users(userID)
);

CREATE TABLE beats (
beatId INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
title TEXT NOT NULL,
duration INT NOT NULL,
bpm int NOT NULL,
youtube_id TEXT NOT NULL,
hashtags TEXT NOT NULL,
avatar_file TEXT NOT NULL,
audio_file TEXT NOT NULL,
price INT NOT NULL,
discount TINYINT,
downloads int
);

CREATE TABLE new_visit (
visit_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
visit_date DATE NOT NULL
);