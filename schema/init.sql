CREATE DATABASE Linea12;
GRANT USAGE ON *.* TO jcubillas@localhost IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON Linea12.* TO jcubillas@localhost ;
USE Linea12;

INSERT INTO branches (name, schedule) VALUES 
('A - Barrancas Belgrano', '06:00 - 17:00'),
('B - Parque Centenario', '08:00 - 19:00'),
('C - Plaza Miserere', '04:00 - 23:00'),
('D - Parque Rivadavia', '00:00 - 22:00'),
('E - Plaza Serrano', '10:00 - 20:00');