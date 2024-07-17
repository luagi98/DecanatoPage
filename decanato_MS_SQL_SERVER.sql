use master;
drop database if exists decanatoDB;
create database decanatoDB;
use decanatoDB;

create table usuarios(
	usuarioId  int not null primary key IDENTITY(1,1),
	username varchar(60) not null,
    contra varchar (60) not null,
    permisos varchar (40) not null
    );

create table fototeca(
	fototecaId int not null primary key IDENTITY(1,1),
    titulo varchar (130) not null,
    descripcion varchar (1200) not null,
    fecha date not null,
    ruta_imagen varchar (90) not null
);

create table linea_del_tiempo(
	historiaId int not null primary key IDENTITY(1,1),
    fecha date not null,
    titulo varchar(130) not null,
    descripcion varchar (1400) not null,
    ruta_imagen1 varchar (100) null,
    ruta_imagen2 varchar (100) null,
    ruta_imagen3 varchar (100) null,
    ruta_video varchar(900) null
);

INSERT INTO usuarios (username, contra, permisos) 
VALUES ('sos', 'sos', '1');

select * from usuarios;

-- insert default images

select * from fototeca;


--select year(fecha) as availible_year from fototeca group by availible_year order by availible_year desc;

--SELECT * FROM fototeca WHERE YEAR(fecha) = 2017;



insert into fototeca (titulo, descripcion, fecha, ruta_imagen)
values
    ('Escuela de Preaprendizaje Número 3', '', '0001-01-01', 'fototecaImg/Esc_Preap_3.jpg'),
    ('Salon Escuela de Preaprendizaje Número 3', '', '0001-01-01', 'fototecaImg/Salon_Esc_Preap_3.jpg'),
    ('Fachada Escuela de Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Fachada_Esc_Prevo_3.jpg'),
    ('Interior Escuela de Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Interior_Esc_Prevo_3.jpg'),
    ('Construccion de la Congregación de Ancianos Desamparados vista 1', 'Vista 1 de la construcción del convento que ocuparía la "Congregación de Ancianos Desamparados"', '0001-01-01', 'fototecaImg/V1_construccion_CAD.jpg'),
    ('Construccion de la Congregación de Ancianos Desamparados vista 2', 'Vista 2 de la construcción del convento que ocuparía la "Congregación de Ancianos Desamparados"', '0001-01-01', 'fototecaImg/V2_construccion_CAD.jpg'),
    ('Ampliación y reconstrucción de la Escuela de Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/AmplyReconst_Esc_Prevo_3.jpg'),
    ('Patio de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Patio_Esc_Prevo_3.jpg'),
    ('Interior de la Escuela Prevocacional Número 3 Vista 2', '', '0001-01-01', 'fototecaImg/V2_Interior_Esc_Prevo_3.jpg'),

    ('Aulas de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Aulas_Esc_Prevo_3.jpg'),
    ('Ceremonia de inauguración de las nuevas instalaciones del plantel', '', '0001-01-01', 'fototecaImg/Inaguracion_Nuevas_Instituciones.jpg'),
    ('Frente del edificio de gobierno ', 'Frente del edificio de gobierno y lateral del edificio de aulas del CECyT 9 "Juan de Dios Bátiz"', '0001-01-01', 'fototecaImg/Frente_edificio_gobierno.jpg'),
    ('Parte trasera de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Puerta_Trasera_Esc_Prevo_3.jpg'),
    ('Fachada del CECYT “Juan de Dios Bátiz” (Escuela antigua)', '', '0001-01-01', 'fototecaImg/Fachada_CECYT_Batiz.jpg'),
    ('Ingeniero Juan de Dios Bátiz Paredes (Retrato)', '', '0001-01-01', 'fototecaImg/Retrato_JuanDB.jpg'),
    ('Fachada del edificio Centro de Estudios Científicos y Tecnológicos “Juan de Dios Bátiz.”', '', '0001-01-01', 'fototecaImg/Fachada_salones_CECYT_JDB.jpg'),
    ('Funcionarios del plantel en reunión', '', '0001-01-01', 'fototecaImg/Funcionarios_junta.jpg'),
    ('Laboratorio de Inglés', '', '0001-01-01', 'fototecaImg/Laboratorio_ingles.jpg'),
    ('Autoridades en el Salón de Clases', '', '0001-01-01', 'fototecaImg/Autoridades_en_salones.jpg'),

    ('Capacitación de profesores', '', '0001-01-01', 'fototecaImg/Capacitacion_profesores.jpg'),
    ('Ingeniero Juan de Dios Bátiz Paredes', '', '0001-01-01', 'fototecaImg/IMG_JuanDB.jpg'),
    ('Ingeniero Juan de Dios Bátiz Paredes', '', '0001-01-01', 'fototecaImg/Retrato_2_JuanDB.jpg'),
    ('Alumnos en el patio de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Alumnos_Patio_Esc_Prevo_3.jpg'),
    ('Auditorio de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Auditorio_Esc_Prevo_3.jpg'),
    ('Francisco del Collado e Illanes', 'Francisco del Collado e Illanes, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de junio de 1935 al 1 de septiembre de 1937', '1935-06-01', 'fototecaImg/Francisco_Collado_Illanes.jpg'),
    ('Rodolfo Uzeta Ramos', 'Rodolfo Uzeta Ramos, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de septiembre de 1937 al 5 de junio de 1939.', '1937-09-01', 'fototecaImg/Rodolfo_Uzeta_Ramos.jpg'),
    ('Alejandro Guilbot Serrano', 'Alejandro Guilbot Serrano, director del Cecyt 9 “Juan de Dios Bátiz” del 5 de julio de 1939 al 31 de enero de 1940.', '1939-07-05', 'fototecaImg/Alejandro_Guilbot_Serrano.jpg'),
    ('Pedro Alvarado Lang', 'Pedro Alvarado Lang, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de febrero de 1940 al 7 de agosto de 1943.', '1940-02-01', 'fototecaImg/Pedro_Alvarado_Lang.jpg'),
    ('José Juárez Sánchez', 'José Juárez Sánchez, director del Cecyt 9 “Juan de Dios Bátiz” del 7 de agosto de 1943 al 13 de septiembre de 1943.', '1943-08-07', 'fototecaImg/José_Juárez_Sánchez.jpg'),

    ('Noé Gómez Rodríguez', 'Noé Gómez Rodríguez, director del Cecyt 9 “Juan de Dios Bátiz” del 14 de septiembre de 1943 al 10 de junio de 1944.', '1943-09-14', 'fototecaImg/Noé_Gómez_Rodríguez.jpg'),
    ('Francisco Campos y Campos', 'Francisco Campos y Campos, director del Cecyt 9 “Juan de Dios Bátiz” del 15 de junio de 1944 al 10 de octubre de 1944.', '1944-06-15', 'fototecaImg/Francisco_Campos_Campos.jpg'),
    ('Baltazar Mendoza Cervantes', 'Baltazar Mendoza Cervantes, director del Cecyt 9 “Juan de Dios Bátiz” del 10 de octubre de 1944 al 31 de julio de 1948.', '1944-10-10', 'fototecaImg/Baltazar_Mendoza_Cervantes.jpg'),
    ('Francisco J. Calderón Barquín', 'Francisco J. Calderón Barquín, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de agosto de 1948 al 16 de febrero de 1952.', '1948-08-01', 'fototecaImg/Francisco_J_Calderón_Barquín.jpg'),
    ('Alfonso Lozano Bernal', 'Alfonso Lozano Bernal, director del Cecyt 9 “Juan de Dios Bátiz” del 16 de febrero de 1952 al 1 de noviembre de 1954.', '1952-02-01', 'fototecaImg/Alfonso_Lozano_Bernal.jpg'),
    ('Benjamín Pichardo Brindis', 'Benjamín Pichardo Brindis, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de noviembre de 1954 al 16 de febrero de 1955.', '1954-11-01', 'fototecaImg/Benjamín_Pichardo_Brindis.jpg'),
    ('Fernando Guerrero González', 'Fernando Guerrero González, director del Cecyt 9 “Juan de Dios Bátiz” del 16 de febrero de 1955 al 1 de febrero de 1966.', '1955-02-16', 'fototecaImg/Fernando_Guerrero_González.jpg'),
    ('Horacio Soto Cruz', 'Horacio Soto Cruz, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de febrero de 1966 al 1 de junio de 1968.', '1966-02-01', 'fototecaImg/Horacio_Soto_Cruz.jpg'),
    ('Toma de posesión del ingeniero Horacio Soto Cruz', '', '0001-01-01', 'fototecaImg/Toma_posesion_HSC.jpg'),
    ('Equipo de trabajo del ingeniero Horacio Soto Cruz.', '', '0001-01-01', 'fototecaImg/Equipo_HSC.jpg'),

    ('Pasillos de la escuela antigua', '', '0001-01-01', 'fototecaImg/Pasillos_esc_antigua.jpg'),
    ('Alfonso Lozano Inman', 'Alfonso Lozano Inman, director del CECyT 9 “Juan de Dios Bátiz” del 1 de junio de 1968 al 14 de julio de 1980.', '1968-06-01', 'fototecaImg/Alfonso_Lozano_Inman.jpg'),
    ('Escudo actual del CECyT 9 "Juan de Dios Bátiz"', '', '0001-01-01', 'fototecaImg/Escudo_Batiz_Actual.jpg'),
    ('Demolición y construcción del CECyT “Juan de Dios Bátiz”', '', '0001-01-01', 'fototecaImg/Demolicion_construccion.jpg'),
    ('Ingeniero Alfonso Lozano Inman y profesores ', 'El ingeniero Alfonso Lozano Inman con profesores del CECyT” Juan de Dios Bátiz”', '0001-01-01', 'fototecaImg/Ing_Alfonzo_Lozano_profesores.jpg'),
    ('Alfredo López Hernández', 'Alfredo López Hernández, director del CECyT 9 “Juan de Dios Bátiz” del 14 de julio de 1980 al 29 de abril de 1986. ', '1980-07-14', 'fototecaImg/Alfredo_López_Hernández.jpg'),
    ('Ingeniero Alfredo López Hernández y su equipo de trabajo.', '', '0001-01-01', 'fototecaImg/Alfredo_López_Hernández_equipo.jpg'),
    ('Laura Pérez de Bátiz e ingeniero Alfredo López Hernández ', 'Sra. Laura Pérez de Bátiz e ingeniero Alfredo López Hernández develando el Busto del Ing. Juan de Dios Bátiz. ', '0001-01-01', 'fototecaImg/Laura_Perez_Batiz_y_ALH.jpg'),
    ('Busto del Ing. Juan de Dios Bátiz', '', '0001-01-01', 'fototecaImg/Busto_JDB.jpg'),
    ('Apolinar Francisco Cruz Lázaro', 'Apolinar Francisco Cruz Lázaro, director del CECyT 9 “Juan de Dios Bátiz” del 29 de abril de 1986 al 31 de marzo de 1992.', '1986-04-29', 'fototecaImg/Apolinar_Francisco_Cruz_Lázaro.jpg'),

    ('Ingeniero Alfredo López Hernández y su equipo de trabajo', '', '0001-01-01', 'fototecaImg/Alfredo_López_Hernández_equipo_2.jpg'),
    ('CECyT N. 9 "Juan de Dios Bátiz"', '', '0001-01-01', 'fototecaImg/Cecyt9_JDB.jpg'),
    ('Ing. Augusto Vázquez de Aquino e Ing. Apolinar Francisco Cruz Lázaro', '', '0001-01-01', 'fototecaImg/IngAVA_IngAFCL.jpg'),
    ('Instalaciones del plantel Puerta Principal', '', '0001-01-01', 'fototecaImg/Instalacion_Puerta_Principal.jpg'),
    ('Augusto Vázquez de Aquino', 'Retrato de Augusto Vázquez de Aquino, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de abril de 1992 al 8 de febrero de 1999.', '1992-04-01', 'fototecaImg/Augusto_Vázquez_Aquino.jpg'),
    ( 'Reunión de Juan de Dios Batiz y Lazaro Cardenas', 'Reunión de trabajo al iniciarse el proyecto politécnico, al centro ingeniero Juan de Dios Bátiz Paredes y general Lázaro Cárdenas', '0001-01-01', 'fototecaImg/reunion_ByL.jpg');
