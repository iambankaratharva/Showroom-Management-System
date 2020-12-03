SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
DROP DATABASE IF EXISTS `Inventory Management`;
CREATE DATABASE `Inventory Management`;
USE `Inventory Management`;

CREATE TABLE `Suppliers`(
		`Supplier ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Supplier Name` VARCHAR(30) NOT NULL,
        `Supplier Contact` BIGINT CHECK (LENGTH(`Supplier Contact`) = 10),
        `City` VARCHAR(30));
ALTER TABLE `Suppliers` AUTO_INCREMENT=1;   
DESC TABLE `Suppliers`;      

INSERT INTO `Suppliers` VALUES (1, 'Hindustan Locomotives', 9011783461, 'Madhurai');
INSERT INTO `Suppliers` VALUES (2, 'Arelcon RMC', 9830812542, 'Ranchi');
INSERT INTO `Suppliers` VALUES (3, 'Shreeji Steel & Alloy Industry', 9764114141, 'Thane');
INSERT INTO `Suppliers` VALUES (4, 'Ruby Chemicals', 9881207893, 'Jodhpur');
INSERT INTO `Suppliers` VALUES (5, 'Biromba - Rubber & Plastic', 7020869963, 'Noida');
INSERT INTO `Suppliers`(`Supplier Name`,`Supplier Contact`,`City`) VALUES ('A1 Enterprises',  9284770223, 'Pune');
SELECT * FROM `Suppliers`;
 
DROP TABLE IF EXISTS `Raw Materials`;
CREATE TABLE `Raw Materials`(
		`RM ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `RM Name` VARCHAR(30) NOT NULL,
        `RM Unit Price` DECIMAL(9,2) NOT NULL CHECK (`RM Unit Price` > 0.00),
		`RM Quantity` INT NOT NULL CHECK (`RM Quantity` >= 0),
        `Supplier ID` INT NOT NULL,
        FOREIGN KEY (`Supplier ID`) REFERENCES `Suppliers`(`Supplier ID`));
ALTER TABLE `Raw Materials` AUTO_INCREMENT=1001;  
DESC TABLE `Raw Materials`;       

INSERT INTO `Raw Materials` VALUES (1001, 'Stainless Steel',1500.00, 32500, 3);
INSERT INTO `Raw Materials` VALUES (1002, 'Aluminium Casings',1700.00, 2500, 3);
INSERT INTO `Raw Materials` VALUES (1003, 'Reinforced Carbon Fibre', 2500.00, 2500, 3);
INSERT INTO `Raw Materials` VALUES (1004, 'Natural Rubber', 500.00,1000, 5);
INSERT INTO `Raw Materials` VALUES (1005, 'Metallic Glass', 5500.00,10000, 3);
INSERT INTO `Raw Materials` VALUES (1006, 'Lithium-Ion Battery', 500.00,10750, 1);
INSERT INTO `Raw Materials` VALUES (1007, 'Radiator', 9500.00,150000, 1);
INSERT INTO `Raw Materials` VALUES (1008, 'Front/Rear Axel', 22500.00,150000, 1);
INSERT INTO `Raw Materials` VALUES (1009, 'Tail Pipe',  1500.00,150000, 1);
INSERT INTO `Raw Materials` VALUES (1010, 'Muffler',  1500.00,150000, 2);
INSERT INTO `Raw Materials` VALUES (1011, 'Catalytic Converter', 500.00,13500, 4);
INSERT INTO `Raw Materials` VALUES (1012, 'Enginer Coolant',  5000.00,1350, 4);
INSERT INTO `Raw Materials` VALUES (1013, 'Sulfuric Acid',  450.00,1250, 4);
INSERT INTO `Raw Materials` VALUES (1014, 'Adhesives',  650.00,1150, 4);
INSERT INTO `Raw Materials` VALUES (1015, 'Automotive Paint', 50500.00, 12500, 4);
INSERT INTO `Raw Materials` VALUES (1016, 'Rack & Pinion Gear', 50.00,50000, 1);
INSERT INTO `Raw Materials` VALUES (1017, 'Ball Joints', 50.00,50000, 1);
INSERT INTO `Raw Materials` VALUES (1018, 'Coil Springs', 50.00,20000, 1);
INSERT INTO `Raw Materials` VALUES (1019, 'CV Joints', 225.00,22500, 1);
INSERT INTO `Raw Materials` VALUES (1020, 'Tubeless Wheels', 3000.00,3000, 1);
INSERT INTO `Raw Materials` VALUES (1021, 'Carburetor', 5500.00,450000, 1);
INSERT INTO `Raw Materials` VALUES (1022, 'Vibration Dampers', 3000.00,5000, 1);
INSERT INTO `Raw Materials` VALUES (1023, 'Fuel Filters', 1500.00,125000, 5);
INSERT INTO `Raw Materials` VALUES (1024, 'Feed Fuel Pump', 10500.00,8900, 4);
INSERT INTO `Raw Materials` VALUES (1025, 'Crankpin', 1500.00,45900, 1);
INSERT INTO `Raw Materials` VALUES (1026, 'Connecting rod', 5000.00,13500, 1);
INSERT INTO `Raw Materials` VALUES (1027, 'Cam Sprocket', 900.00,15000, 2);
INSERT INTO `Raw Materials` VALUES (1028, 'Cam Shaft', 800.00,15000, 2);
INSERT INTO `Raw Materials` VALUES (1029, 'Air Bags', 1500.00,125000, 2);
INSERT INTO `Raw Materials` VALUES (1030, 'Bumpers', 1500.00,125000, 2);
INSERT INTO `Raw Materials` VALUES (1031, 'Mud Flaps', 1500.00,125000, 5);
INSERT INTO `Raw Materials` VALUES (1032, 'Floor Mats', 1500.00,125000, 5);
INSERT INTO `Raw Materials` VALUES (1033, 'Dust Cover', 1500.00,125000, 2);
SELECT * FROM `Raw Materials`;

CREATE TABLE `Finished Products`(
		`Product ID` INT PRIMARY KEY AUTO_INCREMENT,
        `Product Name` VARCHAR(30) NOT NULL,
        `Product Category` VARCHAR(30) NOT NULL CHECK (`Product Category` IN ('SUV', 'Sedan', 'Compact', 'Off Road', 'Mini Van')) ,
        `Product Quantity` INT DEFAULT 0 CHECK (`Product Quantity` >= 0) ,
        `Product Cost` DECIMAL(15,2)  NOT NULL CHECK (`Product Cost` >= 0),
        `Fuel` VARCHAR(15) NOT NULL CHECK (`Fuel` IN ('Diesel','Petrol','Electric','CNG')) ,
        `Product Colour` VARCHAR(15) NOT NULL,
        `No. of seats` INT  NOT NULL CHECK (`No. of seats` BETWEEN 2 AND 12),
        `Manufacturing Year` INT NOT NULL CHECK (`Manufacturing Year` >= 2010));
ALTER TABLE `Finished Products` AUTO_INCREMENT=501;  

INSERT INTO `Finished Products` VALUES (501, 'Mercedes Benz V-Class', 'SUV', 50, 7500000.00, 'Petrol','Black',8, 2017);        
INSERT INTO `Finished Products` VALUES (502, 'Mercedes Benz V-Class', 'SUV', 10, 7500000.00, 'Petrol','White',8, 2017);
INSERT INTO `Finished Products` VALUES (503, 'Mercedes Benz CLS Coupe', 'Sedan', 75, 8600000.00, 'Petrol','Black',4, 2019);
INSERT INTO `Finished Products` VALUES (504, 'Mercedes Benz CLS Coupe', 'Sedan', 50, 8600000.00, 'Petrol','White',4, 2019);
INSERT INTO `Finished Products` VALUES (505, 'Mercedes Benz CLS Coupe', 'Sedan', 25, 8600000.00, 'Diesel','Black',4, 2019);
INSERT INTO `Finished Products` VALUES (506, 'Mercedes Benz CLS Coupe', 'Sedan', 20, 8600000.00, 'Diesel','White',4, 2019);
INSERT INTO `Finished Products` VALUES (507, 'Mercedes Benz E-Class', 'Sedan', 35, 6600000.00, 'Petrol','Black',4, 2016);
INSERT INTO `Finished Products` VALUES (508, 'Mercedes Benz E-Class', 'Sedan', 30, 6600000.00, 'Petrol','White',4, 2016);
INSERT INTO `Finished Products` VALUES (509, 'Mercedes Benz E-Class', 'Sedan', 8, 7600000.00, 'Diesel','Black',4, 2016);
INSERT INTO `Finished Products` VALUES (510, 'Mercedes Benz E-Class', 'Sedan', 5, 7600000.00, 'Diesel','White',4, 2016);
INSERT INTO `Finished Products` VALUES (511, 'Mercedes Benz EQC', 'Compact', 20, 10000000.00, 'Electric','Black',2, 2020);
INSERT INTO `Finished Products` VALUES (512, 'Mercedes Benz EQC', 'Compact', 25, 10000000.00, 'Electric','White',2, 2020);
INSERT INTO `Finished Products` VALUES (513, 'Mercedes Benz G-Class', 'Off Road', 5, 15000000.00, 'Petrol','Brown',5, 2017);
INSERT INTO `Finished Products` VALUES (514, 'Mercedes Benz Metris', 'Mini Van', 5, 5000000.00, 'Petrol','White',10, 2016);
INSERT INTO `Finished Products` VALUES (515, 'Mercedes Benz Metris', 'Mini Van', 5, 5000000.00, 'Petrol','Black',10, 2016);
INSERT INTO `Finished Products` VALUES (516, 'Mercedes Benz Metris', 'Mini Van', 5, 5000000.00, 'Diesel','White',10, 2016);
INSERT INTO `Finished Products` VALUES (517, 'Mercedes Benz Metris', 'Mini Van', 5, 5000000.00, 'Diesel','White',10, 2016);
-- SELECT * FROM `Finished Products`;
SELECT *FROM `Finished Products` WHERE `Product Category`='SUV' AND `Fuel`='Petrol';
CREATE TABLE `Manufactured Into`(
		`Product ID` INT NOT NULL,
        `RM ID` INT NOT NULL,
        `RM Quantity Required` INT NOT NULL CHECK (`RM Quantity Required` >= 0) ,
        PRIMARY KEY (`Product ID`, `RM ID`),
        FOREIGN KEY (`Product ID`) REFERENCES `Finished Products`(`Product ID`),
        FOREIGN KEY (`RM ID`) REFERENCES `Raw Materials`(`RM ID`));
        
INSERT INTO `Manufactured Into` VALUES (501, 1001, 35);
INSERT INTO `Manufactured Into` VALUES (501, 1002, 25);
INSERT INTO `Manufactured Into` VALUES (501, 1003, 10);
INSERT INTO `Manufactured Into` VALUES (501, 1004, 19);
INSERT INTO `Manufactured Into` VALUES (501, 1005, 20);
INSERT INTO `Manufactured Into` VALUES (501, 1007, 4);
INSERT INTO `Manufactured Into` VALUES (501, 1008, 2);
INSERT INTO `Manufactured Into` VALUES (501, 1009, 1);
INSERT INTO `Manufactured Into` VALUES (501, 1010, 5);
INSERT INTO `Manufactured Into` VALUES (501, 1011, 1);
INSERT INTO `Manufactured Into` VALUES (501, 1012, 25);
INSERT INTO `Manufactured Into` VALUES (501, 1013, 10);
INSERT INTO `Manufactured Into` VALUES (501, 1014, 50);
INSERT INTO `Manufactured Into` VALUES (501, 1015, 500);
INSERT INTO `Manufactured Into` VALUES (501, 1016, 200);
INSERT INTO `Manufactured Into` VALUES (501, 1017, 5000);
INSERT INTO `Manufactured Into` VALUES (501, 1018, 40);
INSERT INTO `Manufactured Into` VALUES (501, 1019, 80);
INSERT INTO `Manufactured Into` VALUES (501, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (501, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (501, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (501, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (501, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (501, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (501, 1030, 2);
INSERT INTO `Manufactured Into` VALUES (501, 1031, 3);
INSERT INTO `Manufactured Into` VALUES (501, 1032, 4);
INSERT INTO `Manufactured Into` VALUES (501, 1033, 1);

INSERT INTO `Manufactured Into` VALUES (502, 1001, 35);
INSERT INTO `Manufactured Into` VALUES (502, 1002, 25);
INSERT INTO `Manufactured Into` VALUES (502, 1003, 10);
INSERT INTO `Manufactured Into` VALUES (502, 1004, 19);
INSERT INTO `Manufactured Into` VALUES (502, 1005, 20);
INSERT INTO `Manufactured Into` VALUES (502, 1007, 4);
INSERT INTO `Manufactured Into` VALUES (502, 1008, 2);
INSERT INTO `Manufactured Into` VALUES (502, 1009, 1);
INSERT INTO `Manufactured Into` VALUES (502, 1010, 5);
INSERT INTO `Manufactured Into` VALUES (502, 1011, 1);
INSERT INTO `Manufactured Into` VALUES (502, 1012, 25);
INSERT INTO `Manufactured Into` VALUES (502, 1013, 10);
INSERT INTO `Manufactured Into` VALUES (502, 1014, 50);
INSERT INTO `Manufactured Into` VALUES (502, 1015, 500);
INSERT INTO `Manufactured Into` VALUES (502, 1016, 200);
INSERT INTO `Manufactured Into` VALUES (502, 1017, 5000);
INSERT INTO `Manufactured Into` VALUES (502, 1018, 40);
INSERT INTO `Manufactured Into` VALUES (502, 1019, 80);
INSERT INTO `Manufactured Into` VALUES (502, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (502, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (502, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (502, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (502, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (502, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (502, 1030, 2);
INSERT INTO `Manufactured Into` VALUES (502, 1031, 3);
INSERT INTO `Manufactured Into` VALUES (502, 1032, 4);
INSERT INTO `Manufactured Into` VALUES (502, 1033, 1);

INSERT INTO `Manufactured Into` VALUES (503, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (503, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (503, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (503, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (503, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (503, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (503, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (503, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (503, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (503, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (503, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (503, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (503, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (503, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (503, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (503, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (503, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (503, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (503, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (503, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (503, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (503, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (503, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (503, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (503, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (504, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (504, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (504, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (504, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (504, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (504, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (504, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (504, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (504, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (504, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (504, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (504, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (504, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (504, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (504, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (504, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (504, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (504, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (504, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (504, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (504, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (504, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (504, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (504, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (504, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (505, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (505, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (505, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (505, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (505, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (505, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (505, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (505, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (505, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (505, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (505, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (505, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (505, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (505, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (505, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (505, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (505, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (505, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (505, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (505, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (505, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (505, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (505, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (506, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (506, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (506, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (506, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (506, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (506, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (506, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (506, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (506, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (506, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (506, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (506, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (506, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (506, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (506, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (506, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (506, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (506, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (506, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (506, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (506, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (506, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (506, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (507, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (507, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (507, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (507, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (507, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (507, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (507, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (507, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (507, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (507, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (507, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (507, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (507, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (507, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (507, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (507, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (507, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (507, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (507, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (507, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (507, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (507, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (507, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (507, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (507, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (508, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (508, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (508, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (508, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (508, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (508, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (508, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (508, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (508, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (508, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (508, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (508, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (508, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (508, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (508, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (508, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (508, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (508, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (508, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (508, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (508, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (508, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (508, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (508, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (508, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (509, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (509, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (509, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (509, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (509, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (509, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (509, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (509, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (509, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (509, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (509, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (509, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (509, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (509, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (509, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (509, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (509, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (509, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (509, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (509, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (509, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (509, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (509, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (509, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (509, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (510, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (510, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (510, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (510, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (510, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (510, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (510, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (510, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (510, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (510, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (510, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (510, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (510, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (510, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (510, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (510, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (510, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (510, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (510, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (510, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (510, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (510, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (510, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (510, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (510, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (511, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (511, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (511, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (511, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (511, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (511, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (511, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (511, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (511, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (511, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (511, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (511, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (511, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (511, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (511, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (511, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (511, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (511, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (511, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (511, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (511, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (511, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (511, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (511, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (511, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (512, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (512, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (512, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (512, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (512, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (512, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (512, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (512, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (512, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (512, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (512, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (512, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (512, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (512, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (512, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (512, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (512, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (512, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (512, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (512, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (512, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (512, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (512, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (512, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (512, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (513, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (513, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (513, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (513, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (513, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (513, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (513, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (513, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (513, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (513, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (513, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (513, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (513, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (513, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (513, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (513, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (513, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (513, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (513, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (513, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (513, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (513, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (513, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (513, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (513, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (514, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (514, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (514, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (514, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (514, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (514, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (514, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (514, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (514, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (514, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (514, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (514, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (514, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (514, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (514, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (514, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (514, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (514, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (514, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (514, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (514, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (514, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (514, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (514, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (514, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (515, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (515, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (515, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (515, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (515, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (515, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (515, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (515, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (515, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (515, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (515, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (515, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (515, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (515, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (515, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (515, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (515, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (515, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (515, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (515, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (515, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (515, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (515, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (515, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (515, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (516, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (516, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (516, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (516, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (516, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (516, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (516, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (516, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (516, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (516, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (516, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (516, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (516, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (516, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (516, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (516, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (516, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (516, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (516, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (516, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (516, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (516, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (516, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (516, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (516, 1033, 2);

INSERT INTO `Manufactured Into` VALUES (517, 1001, 25);
INSERT INTO `Manufactured Into` VALUES (517, 1002, 20);
INSERT INTO `Manufactured Into` VALUES (517, 1003, 15);
INSERT INTO `Manufactured Into` VALUES (517, 1004, 14);
INSERT INTO `Manufactured Into` VALUES (517, 1005, 28);
INSERT INTO `Manufactured Into` VALUES (517, 1007, 5);
INSERT INTO `Manufactured Into` VALUES (517, 1008, 3);
INSERT INTO `Manufactured Into` VALUES (517, 1009, 2);
INSERT INTO `Manufactured Into` VALUES (517, 1010, 6);
INSERT INTO `Manufactured Into` VALUES (517, 1011, 2);
INSERT INTO `Manufactured Into` VALUES (517, 1012, 20);
INSERT INTO `Manufactured Into` VALUES (517, 1013, 15);
INSERT INTO `Manufactured Into` VALUES (517, 1014, 45);
INSERT INTO `Manufactured Into` VALUES (517, 1015, 550);
INSERT INTO `Manufactured Into` VALUES (517, 1016, 270);
INSERT INTO `Manufactured Into` VALUES (517, 1017, 6500);
INSERT INTO `Manufactured Into` VALUES (517, 1018, 60);
INSERT INTO `Manufactured Into` VALUES (517, 1019, 90);
INSERT INTO `Manufactured Into` VALUES (517, 1020, 4);
INSERT INTO `Manufactured Into` VALUES (517, 1021, 3);
INSERT INTO `Manufactured Into` VALUES (517, 1022, 7);
INSERT INTO `Manufactured Into` VALUES (517, 1023, 4);
INSERT INTO `Manufactured Into` VALUES (517, 1024, 1);
INSERT INTO `Manufactured Into` VALUES (517, 1029, 6);
INSERT INTO `Manufactured Into` VALUES (517, 1033, 2);
SELECT * FROM `Manufactured Into`;
        
CREATE TABLE `Showroom`(
		`Showroom ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`Showroom Name` VARCHAR(30) NOT NULL,
		`Location` VARCHAR (10) NOT NULL);
ALTER TABLE `Showroom` AUTO_INCREMENT=101;    

INSERT INTO `Showroom` VALUES (101, 'Silver Star', 'Hyderabad'); 
INSERT INTO `Showroom` VALUES (102, 'T & T Motors', 'Delhi'); 
INSERT INTO `Showroom` VALUES (103, 'B U Bhandari Motors', 'Pune'); 
        
-- SELECT * FROM `Showroom`;
        
CREATE TABLE `Cars`(`Showroom ID` INT NOT NULL,
					`Product ID` INT NOT NULL,
                    `Total Quantity` INT DEFAULT 0 CHECK (`Total Quantity` >= 0),
                    PRIMARY KEY (`Showroom ID`, `Product ID`),
                    FOREIGN KEY (`Showroom ID`) REFERENCES `Showroom`(`Showroom ID`),
					FOREIGN KEY (`Product ID`) REFERENCES `Finished Products`(`Product ID`)); 

INSERT INTO `Cars` VALUES (101,501,3);
INSERT INTO `Cars` VALUES (101,502,6);
INSERT INTO `Cars` VALUES (101,503,1);                    
INSERT INTO `Cars` VALUES (101,504,3);
INSERT INTO `Cars` VALUES (101,505,6);
INSERT INTO `Cars` VALUES (101,506,1);                    
INSERT INTO `Cars` VALUES (101,507,3);
INSERT INTO `Cars` VALUES (101,508,6);
INSERT INTO `Cars` VALUES (101,509,1);                    
INSERT INTO `Cars` VALUES (101,510,3);
INSERT INTO `Cars` VALUES (101,511,6);
INSERT INTO `Cars` VALUES (101,512,1);                    
INSERT INTO `Cars` VALUES (101,513,3);
INSERT INTO `Cars` VALUES (101,514,6);
INSERT INTO `Cars` VALUES (101,515,1);                    
INSERT INTO `Cars` VALUES (101,516,3);
INSERT INTO `Cars` VALUES (101,517,6);

INSERT INTO `Cars` VALUES (102,501,3);
INSERT INTO `Cars` VALUES (102,502,6);
INSERT INTO `Cars` VALUES (102,503,1);                    
INSERT INTO `Cars` VALUES (102,504,3);
INSERT INTO `Cars` VALUES (102,505,6);
INSERT INTO `Cars` VALUES (102,506,1);                    
INSERT INTO `Cars` VALUES (102,507,3);
INSERT INTO `Cars` VALUES (102,508,6);
INSERT INTO `Cars` VALUES (102,509,1);                    
INSERT INTO `Cars` VALUES (102,510,3);
INSERT INTO `Cars` VALUES (102,511,6);
INSERT INTO `Cars` VALUES (102,512,1);                    
INSERT INTO `Cars` VALUES (102,513,3);
INSERT INTO `Cars` VALUES (102,514,6);
INSERT INTO `Cars` VALUES (102,515,1);                    
INSERT INTO `Cars` VALUES (102,516,3);
INSERT INTO `Cars` VALUES (102,517,6);

INSERT INTO `Cars` VALUES (103,501,3);
INSERT INTO `Cars` VALUES (103,502,6);
INSERT INTO `Cars` VALUES (103,503,1);                    
INSERT INTO `Cars` VALUES (103,504,3);
INSERT INTO `Cars` VALUES (103,505,6);
INSERT INTO `Cars` VALUES (103,506,1);                    
INSERT INTO `Cars` VALUES (103,507,3);
INSERT INTO `Cars` VALUES (103,508,6);
INSERT INTO `Cars` VALUES (103,509,1);                    
INSERT INTO `Cars` VALUES (103,510,3);
INSERT INTO `Cars` VALUES (103,511,6);
INSERT INTO `Cars` VALUES (103,512,1);                    
INSERT INTO `Cars` VALUES (103,513,3);
INSERT INTO `Cars` VALUES (103,514,6);
INSERT INTO `Cars` VALUES (103,515,1);                    
INSERT INTO `Cars` VALUES (103,516,3);
INSERT INTO `Cars` VALUES (103,517,6);
                   
-- SELECT * FROM `Cars`;

DROP TABLE IF EXISTS `Customers`;
CREATE TABLE `Customers`(
        `Customer ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Customer Password` VARCHAR(30) NOT NULL,
        `Customer Name` VARCHAR(30) NOT NULL,
        `Customer Contact` BIGINT NOT NULL CHECK(LENGTH(`Customer Contact`)=10) ,
        `City` VARCHAR (20) NOT NULL,
        `Street` VARCHAR (20) NOT NULL,
        `Pin Code` INT NOT NULL CHECK (LENGTH(`Pin Code`)= 6) ,
        `DOB` DATE NOT NULL,
        `Gender` VARCHAR(10) NOT NULL CHECK (`Gender` IN ('Male', 'Female')));
ALTER TABLE `Customers` AUTO_INCREMENT=201;
    
INSERT INTO `Customers` VALUES (201, '3274eq2a','Abhimanyu', 9850304321, 'Mumbai', 'Arthur Road',610510, '1975-05-03', 'Male');
INSERT INTO `Customers` VALUES (202, '897234ry','Krisha', 9850304770, 'Pune', 'Nagar Road', 411038, '1973-01-09', 'Female');
INSERT INTO `Customers` VALUES (203, '49r8dsadw32','Nehalika', 9850111321, 'Pune', 'Veer Sawarkar Road',411056, '1990-07-21', 'Female');
INSERT INTO `Customers` VALUES (204, 'audg32','Kabir', 9845673210, 'Mumbai','Azad Road', 422090, '1992-07-05', 'Male');
INSERT INTO `Customers` VALUES (205, '3r87912e','Ved', 8600304321, 'Ahmedabad', 'Apollo Street', 560011, '1971-10-04', 'Male');
INSERT INTO `Customers` VALUES (206, '294r8df134','Shrishti', 8479043210, 'Kolkata', 'Fish Mkt. Road',113400, '1980-08-07', 'Female');
INSERT INTO `Customers` VALUES (207, '498ryuavcgga','Anurag', 9752043210, 'Chennai', 'Golden Route',304456, '1975-04-15', 'Male');
INSERT INTO `Customers` VALUES (208, '45r87wef','Jay', 9836790501, 'Hyderabad', 'Lakdiwalla Pool',200011, '1979-10-10', 'Male');
INSERT INTO `Customers` VALUES (209, '384tr7','Neeti', 9760904321, 'Delhi', 'Akbar Road',134470, '1995-07-04', 'Female');
INSERT INTO `Customers` VALUES (210, '4r8723rasdf','Radha', 9876512341, 'Bangalore', 'High Street', 115400, '1990-11-11', 'Female');
INSERT INTO `Customers` VALUES (211, 'wgf654212','Aayushi', 8605904321, 'Pune', 'Pashan Rd', 134410, '1974-06-13', 'Female');
INSERT INTO `Customers` VALUES (212, 'r23tf82r7f','Viraj', 8654104321, 'Pune', 'Bajirao Rd', 411038, '1965-02-28', 'Male');
INSERT INTO `Customers` VALUES (213, 'dc8yg37r283r','Ranveer', 9761104321, 'Kolkata', 'Fashion St.',113400, '1967-04-11', 'Male');
INSERT INTO `Customers` VALUES (214, '123eyedux','Priya', 9276043210, 'Mumbai', 'Anne Besant Rd',610510, '1970-04-12', 'Female');
INSERT INTO `Customers` VALUES (215, 'f87327gh8r34','Gaurav', 9565573321, 'Mumbai', 'Tuglaq Rd',610510, '1990-10-02', 'Male');

SELECT * , YEAR(CURDATE()) - YEAR(`Customers`.`DOB`) AS `Age` FROM `Customers`;
SELECT *FROM `Customers`;

CREATE TABLE `Cars Owned`(
		`Customer ID` INT NOT NULL,
        `Product ID` INT NOT NULL,
        `No. of Cars` INT CHECK (`No. of Cars` > 0),
        PRIMARY KEY (`Customer ID`,`Product ID`),
        FOREIGN KEY (`Customer ID`) REFERENCES `Customers`(`Customer ID`),
        FOREIGN KEY (`Product ID`) REFERENCES `Finished Products`(`Product ID`));

INSERT INTO `Cars Owned` VALUES (201, 507, 1);
INSERT INTO `Cars Owned` VALUES (201, 517, 2);
INSERT INTO `Cars Owned` VALUES (205, 514, 1);
INSERT INTO `Cars Owned` VALUES (209, 510, 1);

-- SELECT * FROM `Cars Owned`;

DROP TABLE IF EXISTS `Employees`;
CREATE TABLE `Employees`(
		`E ID` INT PRIMARY KEY AUTO_INCREMENT,
        `Employee Password` VARCHAR(30) NOT NULL,
        `Showroom ID` INT NOT NULL,
        `E Name` VARCHAR(30) NOT NULL,
        `Designation` VARCHAR(30) NOT NULL,
        `E Contact No.` BIGINT NOT NULL CHECK (LENGTH(`E Contact No.`) = 10) ,
        `E DOB` DATE NOT NULL,
        `Manager ID` INT ,
        FOREIGN KEY (`Manager ID`) REFERENCES `Employees`(`E ID`),
        FOREIGN KEY (`Showroom ID`) REFERENCES `Showroom`(`Showroom ID`));
ALTER TABLE `Employees` AUTO_INCREMENT=301;    

INSERT INTO `Employees` VALUES (301, '487esd', 101, 'Rodhsi', 'Sales Manager', 7098723621, '1977-01-30', NULL);
INSERT INTO `Employees` VALUES (302, '48752d23e32', 102, 'Gehna', 'Sales Manager', 8913612345, '1990-07-15', NULL);
INSERT INTO `Employees` VALUES (303, '23874y9d', 103, 'Samiskha', 'Sales Manager', 7020922345, '1991-03-13', NULL);
INSERT INTO `Employees` VALUES (304, '327rfghq32', 101, 'Akshay', 'Relationship Manager', 8234023481, '1984-03-30', 304);
INSERT INTO `Employees` VALUES (305, 'sghdfi', 101, 'Riya', 'Accountant', 9285023481, '1986-03-31', 301);
INSERT INTO `Employees` VALUES (306, 'admin2', 102, 'Rahul', 'Sales Representative', 8760023481, '1986-10-10', 302);
INSERT INTO `Employees` VALUES (307, 'admin3', 103, 'Suraj', 'Sales Representative', 9676013481, '1983-12-01', 303);

SELECT * , YEAR(CURDATE()) - YEAR(`Employees`.`E DOB`) AS `Age` FROM `Employees` ORDER BY `E ID` AND `Manager ID`;

DROP TABLE IF EXISTS `Buys From`;
CREATE TABLE `Buys From`(
		`Customer ID` INT NOT NULL,
        `Showroom ID` INT NOT NULL,
        `Product ID` INT NOT NULL,
        `Quantity` INT NOT NULL CHECK(`Quantity` > 0) ,
        `Payment ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Payment Amount` DECIMAL(15,2) NOT NULL,
        `Date of Purchase` DATE NOT NULL,
        FOREIGN KEY (`Product ID`) REFERENCES `Cars`(`Product ID`),
        FOREIGN KEY (`Customer ID`) REFERENCES `Customers`(`Customer ID`),
        FOREIGN KEY (`Showroom ID`) REFERENCES `Showroom`(`Showroom ID`));

INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (201, 101, 501, 5, 35500000, '2017-02-09');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (202, 102, 502, 3, 21300000, '2018-04-21');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (203, 103, 503, 2, 11000000, '2017-05-13');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (204, 101, 504, 4, 11000000, '2016-05-31');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (205, 102, 505, 7, 42000000, '2015-04-10');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (206, 103, 506, 5, 35500000, '2014-02-07');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (207, 101, 509, 6, 42000000, '2018-01-23');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (208, 102, 505, 3, 21300000, '2019-01-20');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (209, 103, 502, 3, 21300000, '2020-04-30');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (210, 103, 508, 3, 21300000, '2019-04-04');
INSERT INTO `Buys From` (`Customer ID`, `Showroom ID`, `Product ID`, `Quantity`, `Payment Amount`, `Date of Purchase`) VALUES (210, 103, 501, 3, 21300000, '2019-04-04');
-- SELECT * FROM `Buys From`;

CREATE TABLE `Inventory Manager`(
	`M ID` INT PRIMARY KEY,
    `M Password`VARCHAR(30),
    `M Name` VARCHAR(30)
);

INSERT INTO `Inventory Manager` VALUES(21,'abcd56', 'Raman');
INSERT INTO `Inventory Manager` VALUES(22,'efgh78', 'Ayush');
-- SELECT *FROM `Inventory Manager`; 


DROP PROCEDURE IF EXISTS `Add Supplier`;
DELIMITER $
CREATE PROCEDURE `Add Supplier` (IN Supplier_Name VARCHAR(30), Supplier_Contact BIGINT, City VARCHAR(30))
	BEGIN
		INSERT INTO `Suppliers` (`Supplier Name`,`Supplier Contact`,`City`) VALUES (Supplier_Name, Supplier_Contact, City);
    END$
DELIMITER ;

-- CALL `Add Supplier` ('Khan Automotive Parts', 9023946037, 'Lucknow');
-- SELECT * FROM `Suppliers`;

DROP PROCEDURE IF EXISTS `Add Raw Materials`;
DELIMITER $
CREATE PROCEDURE `Add Raw Materials` (IN RM_Name VARCHAR(30), IN RM_Unit_Price DECIMAL(9,2), IN RM_Quantity INT, IN Supplier_ID INT)
	BEGIN
		INSERT INTO `Raw Materials` (`RM Name`,`RM Unit Price`,`RM Quantity`,`Supplier ID`) 
									VALUES (RM_Name, RM_Unit_Price, RM_Quantity, Supplier_ID);
	END$
DELIMITER ;
-- CALL `Add Raw Materials` ('Synthetic Paste', 750.00, 10000, 1);
-- SELECT * FROM `Raw Materials`;

DROP PROCEDURE IF EXISTS `Add Finished Products`;
DELIMITER $
CREATE PROCEDURE `Add Finished Products` (IN Product_Name VARCHAR(30), IN Product_Category VARCHAR(30),
										  IN Product_Cost DECIMAL(15,2), IN Fuel VARCHAR(15),
                                          IN Product_Colour VARCHAR(15), IN Seats INT, IN Manufacturing_Year INT)
	BEGIN
		INSERT INTO `Finished Products` (`Product Name`,`Product Category`,`Product Cost`,`Fuel`, 
										`Product Colour`,`No. of seats`,`Manufacturing Year`)
									VALUES (Product_Name, Product_Category,Product_Cost,
											Fuel,Product_Colour,Seats,Manufacturing_Year);
	END$
DELIMITER ;
-- CALL `Add Finished Products`('Mercedes Benz S-Class', 'Sedan',8000000.00, 'Petrol','Black',8, 2020); 
-- SELECT * FROM `Finished Products`;

DROP TRIGGER IF EXISTS `Add Finished Products`;
DELIMITER $
CREATE TRIGGER `Add Finished Products` AFTER INSERT
	ON `Finished Products` FOR EACH ROW
		BEGIN
			INSERT INTO `Cars` VALUES (101, NEW.`Product ID`, 0);
            INSERT INTO `Cars` VALUES (102, NEW.`Product ID`, 0);
            INSERT INTO `Cars` VALUES (103, NEW.`Product ID`, 0);
		END$
DELIMITER ;
-- SELECT * FROM `Cars`;

DROP PROCEDURE IF EXISTS `Configure Car Requirements`;
DELIMITER $
CREATE PROCEDURE `Configure Car Requirements` (IN Product_ID INT, IN Raw_ID INT, IN RM_Quantity INT)
	BEGIN
		INSERT INTO `Manufactured Into` VALUES (Product_ID, Raw_ID, RM_Quantity);
    END$
DELIMITER ;
-- CALL `Configure Car Requirements` (518, 1001, 35);
-- CALL `Configure Car Requirements` (518, 1002, 55);
-- CALL `Configure Car Requirements` (518, 1003, 15);
-- SELECT * FROM `Manufactured Into`;

DROP PROCEDURE IF EXISTS `Add Customer`;
DELIMITER $
CREATE PROCEDURE `Add Customer` (IN Customer_Password VARCHAR(30), IN Customer_Name VARCHAR(30), IN Customer_Contact BIGINT,
								IN City VARCHAR (20),IN Street VARCHAR (20),IN Pin_Code INT, IN DOB DATE, IN Gender VARCHAR(10))
	BEGIN
		INSERT INTO `Customers` (`Customer Password`,`Customer Name`,`Customer Contact`,`City`,`Street`,`Pin Code`,`DOB`,`Gender`) 
        VALUES (Customer_Password,Customer_Name, Customer_Contact, City, Street,Pin_Code, DOB, Gender);
    END$
DELIMITER ;
-- CALL `Add Customer` ('g274e132s','Aamir K', 9999304321, 'Shimla', 'Durga Road',910110, '1965-01-03', 'Male');
-- SELECT * FROM `Customers`;

-- DROP PROCEDURE IF EXISTS `Add Employee`;
-- DELIMITER $
-- CREATE PROCEDURE `Add Employee` (IN Employee_Password VARCHAR(30),IN Showroom_ID INT,IN E_Name VARCHAR(30), IN Designation VARCHAR(30) ,
--         IN E_Contact_No BIGINT, IN E_DOB DATE, IN Manager_ID INT)
-- 	BEGIN
-- 		INSERT INTO `Employees` (`Employee Password`,`Showroom ID`,`E Name`,`Designation`,`E Contact No.`,`E DOB`,`Manager ID`) 
-- 						VALUES (Employee_Password, Showroom_ID, E_Name, Designation, E_Contact_No, E_DOB, Manager_ID);
--     END$
-- DELIMITER ;

-- CALL `Add Employee` ('434trfsd', 103, 'Aarushi', 'Sales Manager', 8148723471, '1990-05-30', NULL);
-- CALL `Add Employee` ('bhcwyuw', 103, 'Rehan', 'Sales Representative', 9103932471, '1992-01-03', 309);
-- SELECT * FROM `Employees`;

DROP PROCEDURE IF EXISTS `Get Raw Materials`;
DELIMITER $
CREATE PROCEDURE `Get Raw Materials` (IN RM_ID INT, IN RM_Quantity INT)
	BEGIN
		UPDATE `Raw Materials` 
			SET `Raw Materials`.`RM Quantity` = (`Raw Materials`.`RM Quantity` + RM_Quantity) 
			WHERE `Raw Materials`.`RM ID` = RM_ID;
	END$
DELIMITER ;
-- CALL `Get Raw Materials`(1004, 500);
-- SELECT * FROM `Raw Materials`;

-- DROP PROCEDURE IF EXISTS `Check Raw Materials`;
-- DELIMITER $
-- CREATE PROCEDURE `Check Raw Materials` ()
-- 	BEGIN
-- 		SELECT * FROM `Raw Materials` ORDER BY `RM ID` ASC;
-- 	END$
-- DELIMITER ;

-- CALL `Check Raw Materials`;

-- Manufacture a Car: simultaneuously deduct the raw materials from the raw material unit required to manufacture a car
-- and increment the no. of cars manufactured
DROP PROCEDURE IF EXISTS `Manufacture a Car`;
DROP PROCEDURE IF EXISTS `Manufacture a Car`;
DELIMITER $
CREATE PROCEDURE `Manufacture a Car` (IN Product_ID INT, IN Product_Quantity INT)
	BEGIN
        UPDATE `Finished Products`
			SET `Finished Products`.`Product Quantity` = (`Finished Products`.`Product Quantity` + Product_Quantity)
            WHERE `Finished Products`.`Product ID` = Product_ID;
		CALL `Auto Increment Raw Materials`();
		-- UPDATE `Raw Materials`, `Manufactured Into`
		-- SET `Raw Materials`.`RM Quantity` = (`Raw Materials`.`RM Quantity` - (`Manufactured Into`.`RM Quantity Required`)*Product_Quantity)
		-- WHERE `Raw Materials`.`RM ID` = `Manufactured Into`.`RM ID` AND `Manufactured Into`.`Product ID` = Product_ID;         
	END$
DELIMITER ;

DROP TRIGGER IF EXISTS `Manufacture a Car`;
DELIMITER $
CREATE TRIGGER `Manufacture a Car` BEFORE UPDATE
	ON `Finished Products` FOR EACH ROW
		BEGIN 
			IF OLD.`Product Quantity` <> NEW.`Product Quantity` THEN
				UPDATE `Raw Materials`, `Manufactured Into`
					SET `Raw Materials`.`RM Quantity` = (`Raw Materials`.`RM Quantity` - (`Manufactured Into`.`RM Quantity Required`)*
						(NEW.`Product Quantity`-OLD.`Product Quantity`))
					WHERE `Raw Materials`.`RM ID` = `Manufactured Into`.`RM ID` AND `Manufactured Into`.`Product ID` = NEW.`Product ID`;       
                -- SET NEW.`RM Quantity` = (OLD.`Raw Materials`.`RM Quantity` - (OLD.`Manufactured Into`.`RM Quantity Required`)
										-- 	*(NEW.`Finished Products`.`Product Quantity`-OLD.`Finished Products`.`Product Quantity`));
			END IF;
		END$
DELIMITER ;

-- CALL `Manufacture a Car`(502, 20);
-- SELECT * FROM `Finished Products`;
-- CALL `Check Raw Materials`;      
DROP PROCEDURE IF EXISTS `Auto Increment Raw Materials`;
DELIMITER $
CREATE PROCEDURE `Auto Increment Raw Materials`()
	BEGIN
		DECLARE Finished INTEGER DEFAULT 0;
		DECLARE RM_ID INT DEFAULT 0;
		DECLARE RM_Quantity INT DEFAULT 0;
		DECLARE `RM Cursor` CURSOR FOR SELECT `RM ID` FROM `Raw Materials`;
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET Finished = 1;
		
		OPEN `RM Cursor`;
		ptr:LOOP
			FETCH `RM Cursor` INTO RM_ID;
			IF Finished = 1 THEN
				LEAVE ptr;
			ELSE
				SELECT `RM Quantity` INTO RM_Quantity FROM `Raw Materials` WHERE `RM ID` = RM_ID;
				IF RM_Quantity < 8000 THEN
					UPDATE `Raw Materials` 
					SET `Raw Materials`.`RM Quantity` = (`Raw Materials`.`RM Quantity` + 8000) 
					WHERE `Raw Materials`.`RM ID` = RM_ID;
				END IF;
			END IF;
		END LOOP ptr;
        CLOSE `RM Cursor`;
	END$
DELIMITER ;

CALL `Manufacture a Car`(517, 5);
SELECT * FROM `Raw Materials`;
SELECT `RM ID` FROM `Raw Materials` WHERE `RM Quantity` < 8000;
CALL `Auto Increment Raw Materials`();

-- Import the cars: Increment the no. of cars at showroom and simultaneously deduct the cars from Finished Product unit. 
-- Function activated for a car only after it as added.

DROP PROCEDURE IF EXISTS `Import the Cars`;
DELIMITER $
CREATE PROCEDURE `Import the Cars` (IN Showroom_ID INT, IN Product_ID INT, Product_Quantity INT)
  proc: BEGIN
		DECLARE Flag INT DEFAULT -1;
		SELECT EXISTS (SELECT * FROM `Cars` WHERE `Showroom ID` = Showroom_ID AND `Product ID` = Product_ID) INTO Flag;
            UPDATE `Cars`
				SET `Cars`.`Total Quantity` = (`Cars`.`Total Quantity` + Product_Quantity)
				WHERE `Cars`.`Showroom ID` = Showroom_ID AND `Cars`.`Product ID` = Product_ID;
	END$
DELIMITER ;

DROP TRIGGER IF EXISTS `Import the Cars`;
DELIMITER $
CREATE TRIGGER `Import the Cars` BEFORE UPDATE
	ON `Cars` FOR EACH ROW
		BEGIN
			DECLARE Flag INT DEFAULT -1;
			SELECT EXISTS (SELECT * FROM `Cars` WHERE `Showroom ID` = NEW.`Showroom ID` AND `Product ID` = NEW.`Product ID`) INTO Flag;
			IF OLD.`Total Quantity` <> NEW.`Total Quantity` THEN
				UPDATE `Finished Products`
					SET `Finished Products`.`Product Quantity` = (`Finished Products`.`Product Quantity` - 
																 (NEW.`Total Quantity` - OLD.`Total Quantity`))
					WHERE `Finished Products`.`Product ID` = NEW.`Product ID`;
			END IF;
		END$
DELIMITER ;

-- SELECT * FROM `Cars`;
-- SELECT * FROM `Finished Products`; 
-- CALL `Import the cars` (101, 502, 3);

DROP PROCEDURE IF EXISTS `Buy a car`;
DELIMITER $
CREATE PROCEDURE `Buy a car` (IN Customer_ID INT, IN Product_ID INT, IN Quantity INT, IN Showroom_ID INT)
  proc: BEGIN
		DECLARE Total_Cost DECIMAL(15,2) DEFAULT 0;
        DECLARE Flag INT DEFAULT -1;
        SELECT (Quantity*`Finished Products`.`Product Cost`) INTO Total_Cost FROM `Finished Products` WHERE `Product ID` = Product_ID;
        
        SELECT EXISTS (SELECT * FROM `Cars Owned` WHERE `Customer ID` = Customer_ID AND `Product ID` = Product_ID) INTO Flag;
        
        IF Flag = 0 THEN
			UPDATE `Cars` 
				SET `Cars`.`Total Quantity` = `Cars`.`Total Quantity` - Quantity
                WHERE `Cars`.`Showroom ID` = Showroom_ID AND `Cars`.`Product ID` = Product_ID;
            INSERT INTO `Cars Owned` VALUES (Customer_ID, Product_ID, Quantity);
		ELSEIF FLAG = 1 THEN 
			UPDATE `Cars` 
				SET `Cars`.`Total Quantity` = `Cars`.`Total Quantity` - Quantity
                WHERE `Cars`.`Showroom ID` = Showroom_ID AND `Cars`.`Product ID` = Product_ID;
			UPDATE `Cars Owned`
				SET `Cars Owned`.`No. of Cars` = `Cars Owned`.`No. of Cars` + Quantity
				WHERE `Cars Owned`.`Customer ID` = Customer_ID AND `Cars Owned`.`Product ID` = Product_ID;
		ELSE 
			LEAVE proc;
		END IF;
        INSERT INTO `Buys From`(`Customer ID`,
								`Showroom ID`, 
								`Product ID`, 
								`Quantity`, 
								`Payment Amount`, 
								`Date of Purchase`) VALUES (Customer_ID, Showroom_ID, Product_ID, Quantity, Total_Cost, CURDATE());
	END$
DELIMITER ;

-- SELECT * FROM `Buys From`;
-- SELECT * FROM `Cars Owned`;
-- SELECT * FROM `Cars`;
-- CALL `Buy a car` (207, 506, 1, 101);

DROP PROCEDURE IF EXISTS `Change Finished Product Cost`;
DELIMITER $
CREATE PROCEDURE `Change Finished Product Cost` (IN Product_ID INT, IN New_Cost DECIMAL(9,2))
	BEGIN
		UPDATE `Finished Products` SET `Product Cost` = New_Cost WHERE `Product ID` = Product_ID;
    END$
DELIMITER ;

-- CALL `Change Finished Product Cost`(503, 7800000.00); 
-- SELECT * FROM `Finished Products`;

DROP PROCEDURE IF EXISTS `Change Raw Material Cost`;
DELIMITER $
CREATE PROCEDURE `Change Raw Material Cost` (IN RM_ID INT, IN New_Cost DECIMAL(9,2))
	BEGIN
		UPDATE `Raw Materials` SET `RM Unit Price` = New_Cost WHERE `RM ID` = RM_ID;
    END$
DELIMITER ;
SELECT *FROM `Raw Materials`;
-- CALL `Change Raw Material Cost`(1070, 1950.00); 
SELECT * FROM `Customers`;
