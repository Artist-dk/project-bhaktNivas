DROP database bnRegister;
CREATE database bnRegister;
use bnRegister;
CREATE TABLE register (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    phone VARCHAR(15),
    checkin VARCHAR(30),
    room_no INT,
    ac INT,
    stat INT
);

ALTER TABLE register
ADD email VARCHAR(15);
ALTER TABLE register
ADD checkout DATETIME;
ALTER TABLE register
ADD adharNo BIGINT;
ALTER TABLE register
ADD roomNo INT;


ALTER TABLE register 
MODIFY COLUMN email VARCHAR(100);
ALTER TABLE register 
MODIFY COLUMN roomNo SMALLINT;

Insert into register (firstName, lastName, phone, checkin, ac) values ("digambar","kumbhar","9988776633","12-10-2932","0");


SELECT * FROM register;


TRUNCATE register;

DELETE FROM `register` WHERE `id`=3;