CREATE TABLE menus_activos (
	id_menu_activo bigint NOT NULL AUTO_INCREMENT,
    menu varchar(10) NOT NULL,
    activo varchar(10) NOT NULL,
    PRIMARY KEY (id_menu_activo)
);

INSERT INTO menus_activos (menu, activo) VALUES 
('menu', 'home'),
('month', 'ene'),
('slc-year', '2024'),
('slc-bank', 'itau');

CREATE TABLE banks (
	id_bank bigint NOT NULL AUTO_INCREMENT,
    descripcion varchar(20) NOT NULL,
    tipo varchar(20) NOT NULL,
    PRIMARY KEY (id_bank)
);

INSERT INTO banks (descripcion, tipo) VALUES 
('Itau', 'Corriente'),
('Estado', 'Vista/Rut');

CREATE TABLE years (
    id_year bigint NOT NULL AUTO_INCREMENT,
    anio varchar(10) NOT NULL,
    PRIMARY KEY (id_year)
);

INSERT INTO years (anio) VALUES 
('2023'),
('2024'),
('2025'),
('2026'),
('2027');