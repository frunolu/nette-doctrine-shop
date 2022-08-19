DELETE FROM `user`;
INSERT INTO `user` (`name`, `username`, `password`, `email`, `ip`, `registration_date`, `role`)
VALUES ('name', 'username', 'password', 'email', '', now(), '1');
