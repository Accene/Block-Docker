CREATE TABLE User(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email varchar(255),
    mdp TEXT (255) 
);

CREATE TABLE articles(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    title varchar(255),
    content TEXT,
    jour DATETIME,
    date_time_edition DATETIME
);

