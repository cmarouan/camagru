CREATE TABLE IF NOT EXISTS `users` (
  `id_user` INT PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(250),
  `email` varchar(250),
  `pass` varchar(250),
  `token` varchar(250),
  `active` INT,
  `active_comment` int
);

CREATE TABLE  IF NOT EXISTS `comments` (
  `id_comment` int primary key AUTO_INCREMENT,
  `id_user` int,
  `id_photo` int,
  `comments` varchar(250),
  `date_comment` datetime
);

CREATE TABLE  IF NOT EXISTS `likes` (
  `id_like` int primary key AUTO_INCREMENT,
  `id_user` int,
  `id_photo` int
);

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` INT PRIMARY KEY AUTO_INCREMENT,
  `image_link` varchar(5000),
  `user_id` int,
  `image_date` datetime 
);

--insert into users (username, email, pass, token, active) values ('cmarouan', 'asdasda', 'asasas', 'asasas', 0) 