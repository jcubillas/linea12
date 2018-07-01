CREATE DATABASE Linea12;
--ALTER USER 'jcubillas'@'localhost' IDENTIFIED WITH mysql_native_password BY '1234'
GRANT USAGE ON *.* TO jcubillas@localhost IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON Linea12.* TO jcubillas@localhost ;
USE Linea12;

INSERT INTO branches (name, schedule) VALUES 
('A - Planetario', '06:00 - 17:00'),
('B - Parque Centenario', '08:00 - 19:00'),
('C - Plaza Miserere', '04:00 - 23:00'),
('D - Parque Rivadavia', '00:00 - 22:00'),
('E - Plaza Serrano', '10:00 - 20:00');

--Branch Nº 1 - Planetario
INSERT INTO stops (name, number, latitude, longitude, branch_id) VALUES
('Cerrito 1301 (Cerrito y Juncal)', 1, '-34.59279837552594', '-58.38296772988451', 1),
('Presidente Quintana 101 (Pte. Quintana y Parera)', 2, '-34.59142702762231', '-58.3860278945275', 1),
('Presidente Quintana 302 (Pte. Quintana y Rodriguez Peña)', 3, '-34.58988435376244', '-58.388039893868836', 1),
('AV Callao 1900 (AV Callao y AV Alvear)', 4, '-34.588403144847135', '-58.38820103178864', 1),
('AV del Libertador 1000 (AV del Libertador y AV Callao)', 5, '-34.58652649712176', '-58.38580080173733', 1),
('AV del Libertador 1200 (AV del Libertador y Eduardo Schiaffino)', 6, '-34.58516343286679', '-58.38844961142024', 1),
('AV Presidente Figueroa Alcorta 2101 (AV Pte. Figueroa Alcorta y AV Pueyrredón)', 7, '-34.584183923693615', '-58.390576287231795', 1),
('AV Presidente Figueroa Alcorta 2389 (AV Pte. Figureoa Alcorta y Juan Antonio Biblioni)', 8, '-34.58252960408792', '-58.394043535080414', 1),
('AV Presidente Figueroa Alcorta 2575 (AV Pte. Figureoa Alcorta y Austria)', 9, '-34.5816407680108', '-58.396035933534506', 1),
('AV Presidente Figueroa Alcorta 2801 (AV Pte. Figureoa Alcorta y Brig. Gral. Juan Facundo Quiroga)', 10, '-34.581580922599606', '-58.39613485977003', 1),
('AV Presidente Figueroa Alcorta 3000 (AV Pte. Figureoa Alcorta y Tagle)', 11, '-34.58061715132764', '-58.39822143749217', 1),
('AV Presidente Figueroa Alcorta 3200 (AV Pte. Figureoa Alcorta y Eduardo Sivori)', 12, '-34.57893135116211', '-58.40145814537641', 1),
('AV Presidente Figueroa Alcorta 3316 (AV Pte. Figureoa Alcorta y Ortiz de Ocampo)', 13, '-34.57821596668402', '-58.40263236195722', 1),
('AV Presidente Figueroa Alcorta 3502 (AV Pte. Figureoa Alcorta y Jerónimo Salguero)', 14, '-34.57654098061937', '-58.40486963508636', 1),
('AV Presidente Figueroa Alcorta 3799 (AV Pte. Figureoa Alcorta y AV Casares)', 15, '-34.57452918835863', '-58.40761100622626', 1),
('AV Sarmiento 3401 (AV Sarmiento y AV Adolfo Berro)', 16, '-34.57211770109954', '-58.412210350140356', 1),
('AV Sarmiento 3431 (AV Sarmiento y AV Iraola)', 17, '-34.574320725632255', '-58.415844544886966', 1),
('AV del Libertador 3500 (AV del Libertador y Fray Justo Santamaria de Oro)', 18, '-34.572784076567935', '-58.41911115992457', 1),
('AV del Libertador 3700 (AV del Libertador y AV Isabel Infanta)', 19, '-34.57154040737207', '-58.42173085576138', 1),
('AV del Libertador 3901 (AV del Libertador y AV Dorrego)', 20, '-34.57056812957072', '-58.42445097315613', 1),
('AV del Libertador 4101 (AV del Libertador - Campo de Polo)', 21, '-34.569494029279994', '-58.42625985596425', 1),
('AV del Libertador 4400 (AV del Libertador y Ortega y Gasset)', 22, '-34.567305606157674', '-58.430103851792865', 1),
('AV del Libertador 4602 (AV del Libertador y Tte. Benjamín Matienzo)', 23, '-34.56608914546435', '-58.43238185869086', 1);
--Hasta acá son 23. 
('AV del Libertador 4802 (AV del Libertador y Maure)', 24, '-34.56488348417872', '-58.43441753749613', 1),
('AV del Libertador 5000 (AV del Libertador y Olleros)', 25, '-34.563716923330134', '-58.436394380308116', 1),
('AV del Libertador 5101 (AV del Libertador y AV Federico Lacroze)', 26, '-34.56288161678307', '-58.43824769591697', 1),
('AV del Libertador 5399 (AV del Libertador y Virrey Loreto)', 27, '-34.56195649792401', '-58.44252500983879', 1),
('José Hernandez 1602 (José Hernandez y AV Luis María Campos)', 28, '-34.56124019220009', '-58.445647158487645', 1),
('José Hernandez 1802 (José Hernandez y 11 de Septiembre)', 29, '-34.56253792673666', '-58.447918853943065', 1),
('3 de Febrero 1802 (3 de Febrero y La Pampa)', 30, '-34.56213592067825', '-58.4497467800943', 1),
('3 de Febrero 2002 (3 de Febrero y Echeverría)', 31, '-34.56025750897938', '-58.42173085576138', 1),
('11 de Septiembre 1888 (11 de Septiembre y Mariscal Antonio José de Sucre)', 32, '-34.56049230519902', '-58.44964335936584', 1);

--Branch Nº 2 - Parque Centenario
INSERT INTO stops (name, number, latitude, longitude, branch_id) VALUES
('Sarmiento 1201 (Sarmiento y Libertad)', 1, '-34.60507609', '-58.38378449', 2),
('Sarmiento 1501 (Sarmiento y Paraná)', 2, '-34.60534604', '-58.38809986', 2),
('Sarmiento 1799 (Sarmiento y AV Callao)', 3, '-34.6055877', '-58.39200408', 2),
('Sarmiento 1999 (Sarmiento y Ayacucho)', 4, '-34.60582172', '-58.39505911', 2),
('Sarmiento 2201 (Sarmiento y Pte. José Evaristo Uriburu)', 5, '-34.60600582', '-58.39819492', 2),
('Sarmiento 2399 (Sarmiento y Azcuénaga)', 6, '-34.60612945', '-58.40058575', 2),
('Sarmiento 2601 (Sarmiento y Paso)', 7, '-34.60637995', '-58.40360765', 2),
('Sarmiento 2801 (Sarmiento y AV Pueyrredón)', 8, '-34.60654053', '-58.40605637', 2),
('Sarmiento 3000 (Sarmiento y Ecuador)', 9, '-34.6066645', '-58.40886211', 2),
('Sarmiento 3200 (Sarmiento y Dr. Tomás Manuel de Anchorena)', 10, '-34.60650737', '-58.41154625', 2),
('Sarmiento 3401 (Sarmiento y Gallo)', 11, '-34.6060825', '-58.41376748', 2),
('Sarmiento 3601 (Sarmiento y Billinghurst)', 12, '-34.60564667', '-58.41610661', 2),
('Sarmiento 3799 (Sarmiento y Bulnes)', 13, '-34.60524706', '-58.41820548', 2),
('Sarmiento 4000 (Sarmiento y AV Medrano)', 14, '-34.60487206', '-58.42103136', 2),
('Sarmiento 4199 (Sarmiento y Gascón)', 15, '-34.60449583', '-58.42424843', 2),
('Sarmiento 4401 (Sarmiento y Pringles)', 16, '-34.60415585', '-58.42754219', 2),
('Antonio Machado 1 (Antonio Machado y Río de Janeiro)', 17, '-34.60395945', '-58.43242883', 2),
('Antonio Machado 199 (Antonio Machado y AV Patricias Argentinas)', 18, '-34.60465267', '-58.43415278', 2);

--Branch Nº 3 - Plaza Miserere
INSERT INTO stops (name, number, latitude, longitude, branch_id) VALUES
('AV Del Libertador 1425 (AV Del Libertador y Montevideo)', 1, '-34.5875556', '-58.38418345', 3),
('Rodriguez Peña 2000 (Rodriguez Peña y Posadas)', 2, '-34.58850974', '-58.38640094', 3),
('Rodriguez Peña 1801 (Rodriguez Peña y AV Pte. Manuel Quintana)', 3, '-34.58967563', '-58.38769913', 3),
('Rodriguez Peña 1627 (Rodriguez Peña y Vicente López)', 4, '-34.59146152', '-58.38963138', 3),
('Vicente López 1899 (Vicente López y Ayacucho)', 5, '-34.59016318', '-58.39176105', 3),
('Vicente López 2050 (Vicente López y Pte. José Evaristo Uriburu)', 6, '-34.58871712', '-58.39401947', 3),
('AV Pueyrredón 2299 (AV Pueyrredón y Vicente López)', 7, '-34.58697553', '-58.39619129', 3),
('AV Pueyrredón 2054 (AV Pueyrredón y José Andrés Pacheco de Melo)', 8, '-34.58831367', '-58.39864552', 3),
('AV Pueyrredón 1802 (AV Pueyrredón y French)', 9, '-34.59006691', '-58.40030044', 3),
('AV Pueyrredón 1599 (AV Pueyrredón y Beruti)', 10, '-34.59274559', '-58.40153425', 3),
('AV Pueyrredón 1401 (AV Pueyrredón y AV Santa Fe)', 11, '-34.59429539', '-58.40225547', 3),
('AV Pueyrredón 1201 (AV Pueyrredón y Gral. Lucio Norberto Mansilla)', 12, '-34.59647949', '-58.40307658', 3),
('AV Pueyrredón 1000 (AV Pueyrredón y AV Córdoba)', 13, '-34.59838768', '-58.4036785', 3),
('AV Pueyrredón 801 (AV Pueyrredón y Viamonte)', 14, '-34.60080444', '-58.40441829', 3),
('AV Pueyrredón 600 (AV Pueyrredón y Lavalle)', 15, '-34.60325703', '-58.40509441', 3),
('AV Pueyrredón 401 (AV Pueyrredón y Valentín Gómez)', 16, '-34.60550608', '-58.40567084', 3),
('AV Pueyrredón 201 (AV Pueyrredón y Pte. Tte. Gral. Juan Domingo Perón)', 17, '-34.60765519', '-58.40608671', 3),
('AV Rivadavia 2802 (AV Rivadavia y AV Pueyrredón)', 18, '-34.61010752', '-58.40605082', 3);

--Branch Nº 4 - Parque Rivadavia
INSERT INTO stops (name, number, latitude, longitude, branch_id) VALUES
('Rosario 300 (Rosario y Viel)', 1, '-34.618895290094734', '-58.43306291408612', 4),
('Rosario 85 (Rosario y Senillosa)', 2, '-34.618442310744356', '-58.42943077776107', 4),
('AV La Plata 180 (AV La Plata y Chaco)', 3, '-34.61695190797384', '-58.42878283282732', 4),
('Hipólito Yrigoyen 4302 (Hipólito Yirigoyen y Muñiz)', 4, '-34.615013954961846', '-58.42759237440623', 4),
('Yatay 119 (Yatay y Lezica)', 5, '-34.613105835374505', '-58.428344067135356', 4),
('Yatay 299 (Yatay y AV Díaz Vélez)', 6, '-34.608893355523755', '-58.429146040146975', 4),
('AV Díaz Vélez 4199 (AV Díaz Vélez y Rawson)', 7, '-34.60870114530558', '-58.426125595778444', 4),
('AV Díaz Vélez 3999 (AV Díaz Vélez y Francisco Acuña de Figueoa)', 8, '-34.608637732229', '-58.42287941620077', 4),
('AV Díaz Vélez 3802 (AV Díaz Vélez y Jerónimo Salguero)', 9, '-34.608583118356336', '-58.420234606403426', 4),
('Jerónimo Salguero 352 (Jerónimo Salguero e Inca)', 10, '-34.60673574186824', '-58.41987733660022', 4),
('Jerónimo Salguero  551 (Jerónimo Salguero y Valentín Gómez)', 11, '-34.604253118586726', '-58.41956069528669', 4),
('AV Corrientes 3900 (AV Corrientes 3900 y Jerónimo Salguero)', 12, '-34.60336240754803', '-58.41929662528412', 4),
('AV Corrientes 3702 (AV Corrientes y Mario Bravo)', 13, '-34.603617592301156', '-58.416936825121866', 4),
('AV Corrientes 3502 (AV Corrientes y Sanchez de Bustamante)', 14, '-34.60400173601828', '-58.41472066276083', 4),
('AV Corrientes 3301 (AV Corrientes y Agüero)', 15, '-34.60407018836955', '-58.41188606627941', 4),
('AV Corrientes 3115 (AV Corrientes y Jean Jaures)', 16, '-34.60409781640737', '-58.40933007214272', 4),
('AV Corrientes 2902 (AV Corrientes y Boulogne Sur Mer)', 17, '-34.60471487533306', '-58.4068280576073', 4),
('AV Pueyrredón 401 (AV Pueyrredón y Valentín Gomez )', 18, '-34.605485739417894', '-58.40563890637037', 4);

--Branch Nº 5 - Plaza Serrano
INSERT INTO stops (name, number, latitude, longitude, branch_id) VALUES
('AV Córdoba 2200 (AV Córdoba y Pasteur)', 1, '-34.59970510493597', '-58.398990072642334', 5),
('AV Córdoba 2499 (AV Córdoba y Larrea)', 2, '-34.599150854815186', '-58.402347992743785', 5),
('AV Córdoba 2650 (AV Córdoba y Boulogne Sur Mer)', 3, '-34.598055426141734', '-58.40452366473744', 5),
('AV Córdoba 2799 (AV Córdoba y Jean Jaures)', 4, '-34.59802893163175', '-58.40645485522816', 5),
('AV Córdoba 3000 (AV Córdoba y Laprida)', 5, '-34.598107705462574', '-58.40942210849539',5),
('AV Córdoba 3199 (AV Córdoba y Gallo)', 6, '-34.59796695222851', '-58.41178834338075', 5),
('AV Córdoba 3399 (AV Córdoba y Billinghurst)', 7, '-34.59786159305678', '-58.414494692276776', 5),
('AV Córdoba 3599 (AV Córdoba y Bulnes)', 8, '-34.59783068272218', '-58.417140260822634', 5),
('AV Córdoba 3799 (AV Córdoba y AV Medrano)', 9, '-34.59773287233563', '-58.42002927500516', 5),
('Gascón 1100 (Gascón y AV Córdoba)', 10, '-34.597424794209864', '-58.42330482312889', 5),
('Gascón 1300 (Gascón y Gorriti)', 11, '-34.59505517558795', '-58.42297137320634', 5),
('Honduras 4301 (Honduras y Lavalleja)', 12, '-34.59337805204354', '-58.423625261643565', 5),
('Honduras 4501 (Honduras y Aráoz)', 13, '-34.592034053650664', '-58.4252344609821', 5),
('Honduras 4701 (Honduras y Malabia)', 14, '-34.59068714106355', '-58.42710127845646', 5),
('Honduras 4900 (Honduras y Gurruchaga)', 15, '-34.58940382345916', '-58.42911291025632', 5);
