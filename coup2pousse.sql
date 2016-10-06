/*CREATE DATABASE 'u842697544_db';*/

USE u842697544_db;

-- -----------------------------------------------------
-- Table 'u842697544_db'.'Users'
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS 'Users'(
	'ID_User' INT(11) NOT NULL AUTO_INCREMENT,
	'Login_User' VARCHAR(255) NOT NULL CHARACTER SET utf8_general_ci,
	'Email_User' VARCHAR(255) NOT NULL CHARACTER SET utf8_general_ci,
	'Password_User' VARCHAR(255) NOT NULL CHARACTER SET utf8_general_ci,
	'Firstname_User' VARCHAR(255) NOT NULL CHARACTER SET utf8_general_ci,
	'Lastname_User' VARCHAR(255) NOT NULL CHARACTER SET utf8_general_ci,
	'Birthday_User' DATE NOT NULL,
	'Signup_User' DATE NOT NULL,
	PRIMARY KEY ('ID_User'),
	INDEX 'ix_login_user' ('Login_User', 'Email_User'),
	UNIQUE INDEX 'ux_login_user' ('Login_User'),
	UNIQUE INDEX 'ux_email_user' ('Email_User')
);
