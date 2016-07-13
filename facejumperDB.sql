mysql -u root -p #raspberry

use facejumper


DROP TABLE IF EXISTS USERS;


CREATE TABLE USERS (
user_id int NOT NULL AUTO_INCREMENT,
user_account varchar(10) NOT NULL,
user_password varchar(32) NOT NULL,
user_record int NOT NULL DEFAULT 0,
user_deaths int NOT NULL DEFAULT 0,
user_jumps int NOT NULL DEFAULT 0,
user_picture varchar(50),
modifiedDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (user_id)
)ENGINE=InnoDB;


DROP PROCEDURE IF EXISTS new_User;
DROP PROCEDURE IF EXISTS delete_User;
DROP PROCEDURE IF EXISTS update_User;


DELIMITER //
    CREATE PROCEDURE new_User (
    	IN w_user_account varchar(10), 
    	IN w_user_password varchar(32),  
    	IN w_user_record int, 
    	IN w_user_deaths int, 
    	IN w_user_jumps int,
    	IN w_user_picture varchar(50)
    )
        BEGIN
            INSERT INTO USERS (user_account, user_password, user_record, user_deaths, user_jumps, user_picture) 
            VALUES (w_user_account, w_user_password, w_user_record, w_user_deaths, w_user_jumps, w_user_picture);
        END//
DELIMITER ;        


DELIMITER //
    CREATE PROCEDURE delete_User (
    	IN w_user_id int
    )
	BEGIN
        DELETE FROM USERS WHERE user_id = w_user_id;
    END//
DELIMITER ;    
	

DELIMITER //  
    CREATE PROCEDURE update_User ( 
        IN w_user_id int,
        IN w_user_password varchar(32), 
        IN w_user_record int,
        IN w_user_deaths int,
        IN w_user_jumps int,
        IN w_user_picture varchar(50)
        )
        BEGIN
            UPDATE USERS SET user_password = w_user_password,  
            user_record = w_user_record, 
            user_deaths = w_user_deaths, 
            user_jumps = w_user_jumps, 
            user_picture = w_user_picture WHERE user_id = w_user_id;
            CALL sort_SCORELEADERBOARD(); 
            CALL sort_DEATHSLEADERBOARD(); 
            CALL sort_JUMPSLEADERBOARD(); 
        END//
DELIMITER ;	
    
    

    

		############### TEST DATA ############

-- USER CREATION --    TRY TO CALL THEM NOT AT THE SAME TIME OR UPDATE WILL BE BUGGED

CALL new_User("Aravinda", "pass123", 0, 0, 0, "picture1.png");
CALL new_User("Lilian", "pass123", 0, 0, 0, "picture2.png");
CALL new_User("Ingvar", "pass123", 0, 0, 0, "picture3.png");
CALL new_User("Yamato", "pass123", 0, 0, 0, "picture4.png");
CALL new_User("Onesimos", "pass123", 0, 0, 0, "picture5.png");
CALL new_User("Sergey", "pass123", 0, 0, 0, "picture6.png");
CALL new_User("Proteus", "pass123", 0, 0, 0, "picture7.png");
CALL new_User("Hilarion", "pass123", 0, 0, 0, "picture8.png");
CALL new_User("Goffredo", "pass123", 0, 0, 0, "picture9.png");


-- USER UPDATE --

CALL update_User(1, "newPassword1", 4200, 6, 50, "newPicture1.png");
CALL update_User(2, "newPassword2", 2093, 10, 36, "newPicture2.png");
CALL update_User(3, "newPassword3", 3871, 13, 87, "newPicture3.png");
CALL update_User(4, "newPassword4", 983, 4, 38, "newPicture4.png");
CALL update_User(5, "newPassword5", 1205, 2, 31, "newPicture5.png");

-- USER DELETE --

CALL delete_User(1);
CALL delete_User(4);
CALL delete_User(6);