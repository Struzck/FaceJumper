

DROP TABLE IF EXISTS USERS;


CREATE TABLE USERS (
user_id int NOT NULL AUTO_INCREMENT,
user_account varchar(10) NOT NULL,
user_password varchar(60) NOT NULL,
user_record int NOT NULL DEFAULT 0,
user_deaths int NOT NULL DEFAULT 0,
user_jumps int NOT NULL DEFAULT 0,
user_picture varchar(50),
PRIMARY KEY (user_id)
)ENGINE=InnoDB;


DROP PROCEDURE IF EXISTS new_User;
DROP PROCEDURE IF EXISTS delete_User;
DROP PROCEDURE IF EXISTS update_User;


DELIMITER //
    CREATE PROCEDURE new_User (
    	IN w_user_account varchar(10), 
    	IN w_user_password varchar(60),  
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
        IN w_user_password varchar(60), 
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
        END//
DELIMITER ;	
    
    

    

		############### TEST DATA ############

-- USER CREATION --    TRY TO CALL THEM NOT AT THE SAME TIME OR UPDATE WILL BE BUGGED

CALL new_User("Player 1", "pass123", 0, 0, 0, "picture1.png");
CALL new_User("Player 2", "pass123", 0, 0, 0, "picture2.png");
CALL new_User("Player 3", "pass123", 0, 0, 0, "picture3.png");
CALL new_User("Player 4", "pass123", 0, 0, 0, "picture4.png");
CALL new_User("Player 5", "pass123", 0, 0, 0, "picture5.png");
CALL new_User("Player 6", "pass123", 0, 0, 0, "picture6.png");
CALL new_User("Player 7", "pass123", 0, 0, 0, "picture7.png");
CALL new_User("Player 8", "pass123", 0, 0, 0, "picture8.png");
CALL new_User("Player 9", "pass123", 0, 0, 0, "picture9.png");
CALL new_User("Player 10", "pass123", 0, 0, 0, "picture10.png");
CALL new_User("Player 11", "pass123", 0, 0, 0, "picture11.png");
CALL new_User("Player 12", "pass123", 0, 0, 0, "picture12.png");
CALL new_User("Player 13", "pass123", 0, 0, 0, "picture13.png");
CALL new_User("Player 14", "pass123", 0, 0, 0, "picture14.png");
CALL new_User("Player 15", "pass123", 0, 0, 0, "picture15.png");
CALL new_User("Player 16", "pass123", 0, 0, 0, "picture16.png");
CALL new_User("Player 17", "pass123", 0, 0, 0, "picture17.png");
CALL new_User("Player 18", "pass123", 0, 0, 0, "picture18.png");
CALL new_User("Player 19", "pass123", 0, 0, 0, "picture19.png");
CALL new_User("Player 20", "pass123", 0, 0, 0, "picture20.png");
CALL new_User("Player 21", "pass123", 0, 0, 0, "picture21.png");
CALL new_User("Player 22", "pass123", 0, 0, 0, "picture22.png");
CALL new_User("Player 23", "pass123", 0, 0, 0, "picture23.png");
CALL new_User("Player 24", "pass123", 0, 0, 0, "picture24.png");
CALL new_User("Player 25", "pass123", 0, 0, 0, "picture25.png");
CALL new_User("Player 26", "pass123", 0, 0, 0, "picture26.png");
CALL new_User("Player 27", "pass123", 0, 0, 0, "picture27.png");
CALL new_User("Player 28", "pass123", 0, 0, 0, "picture28.png");
CALL new_User("Player 29", "pass123", 0, 0, 0, "picture29.png");


-- USER UPDATE --

CALL update_User(1, "newPassword1", 4200, 6, 50, "newPicture1.png");
CALL update_User(2, "newPassword2", 2093, 10, 36, "newPicture2.png");
CALL update_User(3, "newPassword3", 3871, 13, 87, "newPicture3.png");
CALL update_User(4, "newPassword4", 983, 4, 38, "newPicture4.png");
CALL update_User(5, "newPassword5", 1205, 2, 31, "newPicture5.png");
CALL update_User(6, "newPassword6", 4231, 38, 38, "newPicture6.png");
CALL update_User(7, "newPassword7", 5676, 128, 122, "newPicture7.png");
CALL update_User(8, "newPassword8", 2123, 12, 452, "newPicture8.png");
CALL update_User(9, "newPassword9", 123, 434, 983, "newPicture9.png");
CALL update_User(10, "newPassword10", 9854, 43, 238, "newPicture10.png");
CALL update_User(11, "newPassword11", 346, 32, 239, "newPicture11.png");
CALL update_User(12, "newPassword12", 212, 46, 17, "newPicture12.png");
CALL update_User(13, "newPassword13", 212, 64, 38, "newPicture13.png");
CALL update_User(14, "newPassword14", 757, 19, 69, "newPicture14.png");
CALL update_User(15, "newPassword15", 897, 87, 91, "newPicture15.png");
CALL update_User(16, "newPassword16", 4545, 343, 40, "newPicture16.png");
CALL update_User(17, "newPassword17", 9524, 94, 65, "newPicture17.png");
CALL update_User(18, "newPassword18", 1452, 10, 57, "newPicture18.png");
CALL update_User(19, "newPassword19", 6523, 47, 27, "newPicture19.png");
CALL update_User(20, "newPassword20", 3345, 87, 394, "newPicture20.png");
CALL update_User(21, "newPassword21", 1111, 14, 48, "newPicture21.png");
CALL update_User(22, "newPassword22", 8654, 24, 9, "newPicture22.png");
CALL update_User(23, "newPassword23", 78, 498, 271, "newPicture23.png");
CALL update_User(24, "newPassword24", 2345, 47, 34, "newPicture24.png");
CALL update_User(25, "newPassword25", 7234, 9, 74, "newPicture25.png");
CALL update_User(26, "newPassword26", 7653, 47, 74, "newPicture26.png");
CALL update_User(27, "newPassword27", 4543, 17, 87, "newPicture27.png");
CALL update_User(28, "newPassword28", 4572, 39, 53, "newPicture28.png");
CALL update_User(29, "newPassword29", 4532, 16, 50, "newPicture29.png");


-- USER DELETE --

CALL delete_User(1);
CALL delete_User(4);
CALL delete_User(6);