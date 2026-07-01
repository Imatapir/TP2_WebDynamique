CREATE DATABASE forums_maisonneuve;
CREATE TABLE user(
user_id INT NOT NULL AUTO_INCREMENT,
user_name VARCHAR(100) NOT NULL,
user_pseudonyme VARCHAR(45) NOT NULL UNIQUE,
user_password VARCHAR(255) NOT NULL,
user_birthdate DATE,
CONSTRAINT pk_user_id PRIMARY KEY (user_id)
);
CREATE TABLE forum(
forum_id INT NOT NULL AUTO_INCREMENT,
forum_title VARCHAR(100) NOT NULL,
forum_article TEXT,
forum_date DATE NOT NULL,
user_id INT,
CONSTRAINT pk_forum_id PRIMARY KEY (forum_id),
CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES user(user_id)
);
ALTER TABLE forum
MODIFY COLUMN forum_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


