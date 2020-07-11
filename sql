CREATE DATABASE `user`;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);
  ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
