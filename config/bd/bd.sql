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

CREATE TABLE static_pays(
    id_static_pays bigint NOT NULL AUTO_INCREMENT,
    descripcion varchar(50) NOT NULL,
    class_color varchar(30) NOT NULL,
    Monto bigint NOT NULL,
    dia_vencimiento int NOT NULL,
    id_bank bigint NOT NULL,
    mes varchar(10) NOT NULL,
    anio varchar(10) NOT NULL,
    estado int NOT NULL,
    fecha_pago varchar(20) NULL,
    fecha_registro varchar(20) NULL,
    PRIMARY KEY (id_static_pays)
);