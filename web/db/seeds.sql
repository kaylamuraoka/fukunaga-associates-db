-- Insert text values into users table
INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `profileImg`, `createdAt`, `updatedAt`)
VALUES
	(11, 'test', 'test', 'test@test.com', 'testpassword', NULL, NOW(), NOW());
