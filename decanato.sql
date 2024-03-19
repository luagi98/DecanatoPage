drop database if exists decanatoDB;
create database decanatoDB;
use decanatoDB;

create table usuarios(
	usuarioId  int not null primary key auto_increment,
	username varchar(60) not null,
    contra varchar (60) not null,
    permisos varchar (40) not null
    );

create table fototeca(
	fototecaId int not null primary key auto_increment,
    titulo varchar (130) not null,
    descripcion varchar (1200) not null,
    fecha date not null,
    ruta_imagen varchar (90) not null
);

create table linea_del_tiempo(
	historiaId int not null primary key auto_increment,
    fecha date not null,
    titulo varchar(130) not null,
    descripcion varchar (1400) not null,
    ruta_imagen1 varchar (100) null,
    ruta_imagen2 varchar (100) null,
    ruta_imagen3 varchar (100) null,
    ruta_video varchar(900) null
);

insert into usuarios value (1,"sos","sos","1");
select * from usuarios;

-- insert default images

select * from fototeca;


select year(fecha) as availible_year from fototeca group by availible_year order by availible_year desc;

SELECT * FROM fototeca WHERE YEAR(fecha) = 2017;



insert into fototeca values (1, 'Escuela de Preaprendizaje Número 3', '', '0001-01-01', 'fototecaImg/Esc_Preap_3.jpg');
insert into fototeca values (2, 'Salon Escuela de Preaprendizaje Número 3', '', '0001-01-01', 'fototecaImg/Salon_Esc_Preap_3.jpg');
insert into fototeca values (3, 'Fachada Escuela de Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Fachada_Esc_Prevo_3.jpg');
insert into fototeca values (4, 'Interior Escuela de Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Interior_Esc_Prevo_3.jpg');
insert into fototeca values (5, 'Construccion de la Congregación de Ancianos Desamparados vista 1', 'Vista 1 de la construcción del convento que ocuparía la "Congregación de Ancianos Desamparados"', '0001-01-01', 'fototecaImg/V1_construccion_CAD.jpg');
insert into fototeca values (6, 'Construccion de la Congregación de Ancianos Desamparados vista 2', 'Vista 2 de la construcción del convento que ocuparía la "Congregación de Ancianos Desamparados"', '0001-01-01', 'fototecaImg/V2_construccion_CAD.jpg');
insert into fototeca values (7, 'Ampliación y reconstrucción de la Escuela de Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/AmplyReconst_Esc_Prevo_3.jpg');
insert into fototeca values (8, 'Patio de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Patio_Esc_Prevo_3.jpg');
insert into fototeca values (9, 'Interior de la Escuela Prevocacional Número 3 Vista 2', '', '0001-01-01', 'fototecaImg/V2_Interior_Esc_Prevo_3.jpg');

insert into fototeca values (10,'Aulas de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Aulas_Esc_Prevo_3.jpg');
insert into fototeca values (11,'Ceremonia de inauguración de las nuevas instalaciones del plantel', '', '0001-01-01', 'fototecaImg/Inaguracion_Nuevas_Instituciones.jpg');
insert into fototeca values (12,'Frente del edificio de gobierno ', 'Frente del edificio de gobierno y lateral del edificio de aulas del CECyT 9 "Juan de Dios Bátiz"', '0001-01-01', 'fototecaImg/Frente_edificio_gobierno.jpg');
insert into fototeca values (13,'Parte trasera de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Puerta_Trasera_Esc_Prevo_3.jpg');
insert into fototeca values (14,'Fachada del CECYT “Juan de Dios Bátiz” (Escuela antigua)', '', '0001-01-01', 'fototecaImg/Fachada_CECYT_Batiz.jpg');
insert into fototeca values (15,'Ingeniero Juan de Dios Bátiz Paredes (Retrato)', '', '0001-01-01', 'fototecaImg/Retrato_JuanDB.jpg');
insert into fototeca values (16,'Fachada del edificio Centro de Estudios Científicos y Tecnológicos “Juan de Dios Bátiz.”', '', '0001-01-01', 'fototecaImg/Fachada_salones_CECYT_JDB.jpg');
insert into fototeca values (17,'Funcionarios del plantel en reunión', '', '0001-01-01', 'fototecaImg/Funcionarios_junta.jpg');
insert into fototeca values (18,'Laboratorio de Inglés', '', '0001-01-01', 'fototecaImg/Laboratorio_ingles.jpg');
insert into fototeca values (19,'Autoridades en el Salón de Clases', '', '0001-01-01', 'fototecaImg/Autoridades_en_salones.jpg');

insert into fototeca values (20,'Capacitación de profesores', '', '0001-01-01', 'fototecaImg/Capacitacion_profesores.jpg');
insert into fototeca values (21,'Ingeniero Juan de Dios Bátiz Paredes', '', '0001-01-01', 'fototecaImg/IMG_JuanDB.jpg');
insert into fototeca values (22,'Ingeniero Juan de Dios Bátiz Paredes', '', '0001-01-01', 'fototecaImg/Retrato_2_JuanDB.jpg');
insert into fototeca values (23,'Alumnos en el patio de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Alumnos_Patio_Esc_Prevo_3.jpg');
insert into fototeca values (24,'Auditorio de la Escuela Prevocacional Número 3', '', '0001-01-01', 'fototecaImg/Auditorio_Esc_Prevo_3.jpg');
insert into fototeca values (25,'Francisco del Collado e Illanes', 'Francisco del Collado e Illanes, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de junio de 1935 al 1 de septiembre de 1937', '1935-06-01', 'fototecaImg/Francisco_Collado_Illanes.jpg');
insert into fototeca values (26,'Rodolfo Uzeta Ramos', 'Rodolfo Uzeta Ramos, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de septiembre de 1937 al 5 de junio de 1939.', '1937-09-01', 'fototecaImg/Rodolfo_Uzeta_Ramos.jpg');
insert into fototeca values (27,'Alejandro Guilbot Serrano', 'Alejandro Guilbot Serrano, director del Cecyt 9 “Juan de Dios Bátiz” del 5 de julio de 1939 al 31 de enero de 1940.', '1939-07-05', 'fototecaImg/Alejandro_Guilbot_Serrano.jpg');
insert into fototeca values (28,'Pedro Alvarado Lang', 'Pedro Alvarado Lang, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de febrero de 1940 al 7 de agosto de 1943.', '1940-02-01', 'fototecaImg/Pedro_Alvarado_Lang.jpg');
insert into fototeca values (29,'José Juárez Sánchez', 'José Juárez Sánchez, director del Cecyt 9 “Juan de Dios Bátiz” del 7 de agosto de 1943 al 13 de septiembre de 1943.', '1943-08-07', 'fototecaImg/José_Juárez_Sánchez.jpg');

insert into fototeca values (30,'Noé Gómez Rodríguez', 'Noé Gómez Rodríguez, director del Cecyt 9 “Juan de Dios Bátiz” del 14 de septiembre de 1943 al 10 de junio de 1944.', '1943-09-14', 'fototecaImg/Noé_Gómez_Rodríguez.jpg');
insert into fototeca values (31,'Francisco Campos y Campos', 'Francisco Campos y Campos, director del Cecyt 9 “Juan de Dios Bátiz” del 15 de junio de 1944 al 10 de octubre de 1944.', '1944-06-15', 'fototecaImg/Francisco_Campos_Campos.jpg');
insert into fototeca values (32,'Baltazar Mendoza Cervantes', 'Baltazar Mendoza Cervantes, director del Cecyt 9 “Juan de Dios Bátiz” del 10 de octubre de 1944 al 31 de julio de 1948.', '1944-10-10', 'fototecaImg/Baltazar_Mendoza_Cervantes.jpg');
insert into fototeca values (33,'Francisco J. Calderón Barquín', 'Francisco J. Calderón Barquín, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de agosto de 1948 al 16 de febrero de 1952.', '1948-08-01', 'fototecaImg/Francisco_J_Calderón_Barquín.jpg');
insert into fototeca values (34,'Alfonso Lozano Bernal', 'Alfonso Lozano Bernal, director del Cecyt 9 “Juan de Dios Bátiz” del 16 de febrero de 1952 al 1 de noviembre de 1954.', '1952-02-01', 'fototecaImg/Alfonso_Lozano_Bernal.jpg');
insert into fototeca values (35,'Benjamín Pichardo Brindis', 'Benjamín Pichardo Brindis, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de noviembre de 1954 al 16 de febrero de 1955.', '1954-11-01', 'fototecaImg/Benjamín_Pichardo_Brindis.jpg');
insert into fototeca values (36,'Fernando Guerrero González', 'Fernando Guerrero González, director del Cecyt 9 “Juan de Dios Bátiz” del 16 de febrero de 1955 al 1 de febrero de 1966.', '1955-02-16', 'fototecaImg/Fernando_Guerrero_González.jpg');
insert into fototeca values (37,'Horacio Soto Cruz', 'Horacio Soto Cruz, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de febrero de 1966 al 1 de junio de 1968.', '1966-02-01', 'fototecaImg/Horacio_Soto_Cruz.jpg');
insert into fototeca values (38,'Toma de posesión del ingeniero Horacio Soto Cruz', '', '0001-01-01', 'fototecaImg/Toma_posesion_HSC.jpg');
insert into fototeca values (39,'Equipo de trabajo del ingeniero Horacio Soto Cruz.', '', '0001-01-01', 'fototecaImg/Equipo_HSC.jpg');

insert into fototeca values (40,'Pasillos de la escuela antigua', '', '0001-01-01', 'fototecaImg/Pasillos_esc_antigua.jpg');
insert into fototeca values (41,'Alfonso Lozano Inman', 'Alfonso Lozano Inman, director del CECyT 9 “Juan de Dios Bátiz” del 1 de junio de 1968 al 14 de julio de 1980.', '1968-06-01', 'fototecaImg/Alfonso_Lozano_Inman.jpg');
insert into fototeca values (42,'Escudo actual del CECyT 9 "Juan de Dios Bátiz"', '', '0001-01-01', 'fototecaImg/Escudo_Batiz_Actual.jpg');
insert into fototeca values (43,'Demolición y construcción del CECyT “Juan de Dios Bátiz”', '', '0001-01-01', 'fototecaImg/Demolicion_construccion.jpg');
insert into fototeca values (44,'Ingeniero Alfonso Lozano Inman y profesores ', 'El ingeniero Alfonso Lozano Inman con profesores del CECyT” Juan de Dios Bátiz”', '0001-01-01', 'fototecaImg/Ing_Alfonzo_Lozano_profesores.jpg');
insert into fototeca values (45,'Alfredo López Hernández', 'Alfredo López Hernández, director del CECyT 9 “Juan de Dios Bátiz” del 14 de julio de 1980 al 29 de abril de 1986. ', '1980-07-14', 'fototecaImg/Alfredo_López_Hernández.jpg');
insert into fototeca values (46,'Ingeniero Alfredo López Hernández y su equipo de trabajo.', '', '0001-01-01', 'fototecaImg/Alfredo_López_Hernández_equipo.jpg');
insert into fototeca values (47,'Laura Pérez de Bátiz e ingeniero Alfredo López Hernández ', 'Sra. Laura Pérez de Bátiz e ingeniero Alfredo López Hernández develando el Busto del Ing. Juan de Dios Bátiz. ', '0001-01-01', 'fototecaImg/Laura_Perez_Batiz_y_ALH.jpg');
insert into fototeca values (48,'Busto del Ing. Juan de Dios Bátiz', '', '0001-01-01', 'fototecaImg/Busto_JDB.jpg');
insert into fototeca values (49,'Apolinar Francisco Cruz Lázaro', 'Apolinar Francisco Cruz Lázaro, director del CECyT 9 “Juan de Dios Bátiz” del 29 de abril de 1986 al 31 de marzo de 1992.', '1986-04-29', 'fototecaImg/Apolinar_Francisco_Cruz_Lázaro.jpg');

insert into fototeca values (50,'Ingeniero Alfredo López Hernández y su equipo de trabajo', '', '0001-01-01', 'fototecaImg/Alfredo_López_Hernández_equipo_2.jpg');
insert into fototeca values (51,'CECyT N. 9 "Juan de Dios Bátiz"', '', '0001-01-01', 'fototecaImg/Cecyt9_JDB.jpg');
insert into fototeca values (52,'Ing. Augusto Vázquez de Aquino e Ing. Apolinar Francisco Cruz Lázaro', '', '0001-01-01', 'fototecaImg/IngAVA_IngAFCL.jpg');
insert into fototeca values (53,'Instalaciones del plantel Puerta Principal', '', '0001-01-01', 'fototecaImg/Instalacion_Puerta_Principal.jpg');
insert into fototeca values (54,'Augusto Vázquez de Aquino', 'Retrato de Augusto Vázquez de Aquino, director del Cecyt 9 “Juan de Dios Bátiz” del 1 de abril de 1992 al 8 de febrero de 1999.', '1992-04-01', 'fototecaImg/Augusto_Vázquez_Aquino.jpg');
insert into fototeca values (55, 'Reunión de Juan de Dios Batiz y Lazaro Cardenas', 'Reunión de trabajo al iniciarse el proyecto politécnico, al centro ingeniero Juan de Dios Bátiz Paredes y general Lázaro Cárdenas', '0001-01-01', 'fototecaImg/reunion_ByL.jpg');


-- insert into linea_del_tiempo values(0, "1935-01-01", "Inicio de la Escuela de Preaprendizaje No. 3","Se nombro primer Director al Ing. Francisco J. del Collado e Illanes, designado por el Ing. Juan de Dios Bátiz Paredes. En su primer semestre 114 aspirantes fueron inscritos para la segunda mitad de 1935 formando 4 grupos de primer año. Esta escuela se inició con el horario de 8 a 14 horas donde se instruían las materias de Aritmética y Geometría, Dibujo, Legislación del Trabajo, Higiene, Historia, Castellano y Geografía; y por la tarde en el horario de 16 a 20 horas se impartían los talleres de Carpintería, Hojalatería, Electricidad y Herrería.","public_html/img/img_cards/imgTimeline1-1.png","","","");
-- insert into linea_del_tiempo values(0, "1936-01-01", "Fundación del Instituto Politécnico Nacional","El General Lázaro Cárdenas del Rio con la finalidad de atender en forma más específica las necesidades técnico-industriales que el país requería, su tarea primordial sería la de generar ingenieros y técnicos en áreas especializadas que fortalecieran el desarrollo de la nación. Por ello el Instituto toma un gran impulso y la demanda de la juventud por ingresar a sus espacios crece de manera exponencial. Estando al frente del Departamento de Enseñanza Técnica, el ingeniero Juan de Dios Bátiz, con el apoyo del presidente Lázaro Cárdenas,  trabajó en una institución que se encargara de la educacion técnica en México, dando origen al Instituto Politécnico Nacional.","public_html/img/img_cards/imgTimeline2-1.png","public_html/img/img_cards/imgTimeline2-2.png","","");
-- insert into linea_del_tiempo values(0, "1938-01-01","Surgen los Fogoneros Infernales", "Lo que en ese entonces era la Prevocacional 3 se convirtio en la casa de un equipo de Futbol Americano: Los Fogoneros Infernales, que hasta en su nombre deportivo reflejan algo de su particular idiosincrasia: Fogoneros, por la cercanía de los edificios al paso del Ferrocarril de Cuernavaca, cuyo silbato madrugador, servia de despertador a los habitantes de los sótanos; e Infernales, tal vez porque, para mucha gente, la forma de ser y el comportamiento de los jugadores del Equipo era verdaderamente infernal.  Su primer entrenador, José Alvarado de la Tejera","public_html/img/img_cards/imgTimeline3-1.png","","","");
-- insert into linea_del_tiempo values(0, "1944-01-01","De la SEP al IPN", "La SEP pasa el control técnico-administrativo de las prevocacionales 1, 2, 3, 4 y 5 del DF al IPN. En el año de 1944 las escuelas prevocacionales pasaron a ser escuelas tecnológicas. Fue así como la Prevocacional núm. 3 se convirtió en Escuela Tecnológica núm. 3, sin perder por ello su vinculación con el IPN. Sus nuevos planes de estudio de tres años eran equivalentes a los de segunda enseñanza con los enfoques formativos que se requerían para el desarrollo industrial del país en ese momento. Al darse los cambios necesarios para la evolución de la educación vinculada orgánicamente al IPN.","public_html/img/img_cards/imgTimeline4-1.png","public_html/img/img_cards/imgTimeline4-2.png","","");
-- insert into linea_del_tiempo values(0, "1948-01-01","Escuela Tecnologica 3", "Escuelas prevocacionales pasaron a ser escuelas tecnológicas. Fue así como la Prevocacional núm. 3 se convirtió en Escuela Tecnológica núm. 3, sin perder por ello su vinculación con el IPN. Sus nuevos planes de estudio de tres años eran equivalentes a los de segunda enseñanza con los enfoques formativos que se requerían para el desarrollo industrial del país en ese momento.","","","","");
-- --insert into linea_del_tiempo values(0, "1952-01-01","Mantenimiento de las instalaciones", "Sus nuevos planes de estudio de tres años eran equivalentes a los de segunda enseñanza con los enfoques formativos que se requerían para el desarrollo industrial del país en ese momento.","","","","");
-- insert into linea_del_tiempo values(0, "1964-01-01","Especialidades cortas", "Se proyectaron dos nuevas especialidades cortas, Computación Electrónica y Mantenimiento de Sistemas de Computación, mismas que cubrirían un nivel sub profesional de tipo terminal.","public_html/img/img_cards/imgTimeline7-1.png","","","");
-- insert into linea_del_tiempo values(0, "1967-01-01","Vocacional 9","En 1967 como resultado de una reestructuración académica administrativa el plantel pasó a ser la Vocacional núm. 9 de Ciencias Físico Matemáticas.","public_html/img/img_cards/imgTimeline8-1.png","","","");
-- insert into linea_del_tiempo values(0, "1969-01-01","Vocacional 9 Juan de Dios Bátiz","En el año de 1969, a la entonces Escuela Vocacional núm. 9 se le asignó de manera oficial el nombre de “Juan de Dios Bátiz”, en honor a su ilustre fundador. Aunque en realidad desde hacía tiempo ya se referían a ella con este nombre sin estar todavía oficializado.
-- En esa nueva etapa evolutiva como Escuela Vocacional, fue ganando gran prestigio entre las demás escuelas de nivel medio superior, por su orden, disciplina y su reconocida calidad académica y humana.","public_html/img/img_cards/imgTimeline9-1.png","","","");
-- insert into linea_del_tiempo values(0, "1972-01-01","Vocacional a CECyT","Las vocacionales tecnológicas se transformaron en centros de estudios científicos y tecnológicos, por eso a partir de esa fecha, se le conoce a este plantel como CECyT núm. 9 “Juan de Dios Bátiz.” Desde entonces cuenta con un plan de estudios de seis semestres, con una función bivalente que permite a los alumnos elegir entre dos opciones, por una parte, la elección terminal como técnico de nivel medio superior, o bien la función propedéutica para el nivel superior. En aquel momento se impartían las carreras de Máquinas-Herramienta, Programación y Electricidad.","public_html/img/img_cards/imgTimeline10-1.png","","","");
-- insert into linea_del_tiempo values(0, "1972-01-01","Instauración de la carrera Técnica de Programacion","Con el cambio de Vocacionales a Centros de Estudios Cientificos y Tecnológicos, una de las carreras que se instauró en esos momentos fue la carrera de técnico en programación que, hasta la fecha, continua únicamente con cambios en los planes de estudio.","public_html/img/img_cards/imgTimeline11-1.png","","","");
-- insert into linea_del_tiempo values(0, "1977-01-01","Nace Expo-Bátiz","Se crea Expo-Bátiz en Física y en las especialidades de ese entonces, después se integraron todas las áreas, lo que inicio la exposición académico-tecnológica que ahora se realiza año con año.","public_html/img/img_cards/imgTimeline12-1.png","","","");
-- insert into linea_del_tiempo values(0, "1980-01-01","Modernizacion de los laboratorios y talleres","Se modernizaron las instalaciones y el equipo de talleres y laboratorios, se estableció el laboratorio de Idiomas y se acondicionó el laboratorio de Biología.","public_html/img/img_cards/imgTimeline13-1.png","","","");
-- insert into linea_del_tiempo values(0, "1987-01-01","Instauración de la carrera Técnica de Sistemas Digitales","Esta carrera se implementa en 1987 para sustituir a la carrera de Electricidad, y así se logró la instauración de un cambio curricular en la ubicación y secuencia programática existente.","public_html/img/img_cards/imgTimeline14-1.png","","","");
-- insert into linea_del_tiempo values(0, "1990-01-01","Instauración de la carrera Técnica de Máquinas con Sistemas Automatizados","Esta carrera se implementa en 1990, sustituyendo a la carrera de Maquina Herramientas","public_html/img/img_cards/imgTimeline15-1.png","","","");
-- insert into linea_del_tiempo values(0, "1997-01-01","Inauguración del Aula Siglo XXI","Se inagura el aula Siglo XXI (Ahora Aula 4.0). El aula Siglo XXI se adecuó, así como el taller de la Unidad de Informática UDI, para que se trabajara con mayor eficiencia en estas áreas, optimizándose los espacios y los recursos que éstas ofrecían.","public_html/img/img_cards/imgTimeline16-1.png","","","https://www.youtube.com/embed/isvhrZiwGOw");
-- insert into linea_del_tiempo values(0, "2003-01-01","Titulación como Técnico","Se apoyo la titulación, estando en condiciones de titularse 26 alumnos en Máquinas con Sistemas Automatizados, 89 en Sistemas Digitales y 140 en Programación.","public_html/img/img_cards/imgTimeline17-1.png","public_html/img/img_cards/imgTimeline17-2.png","public_html/img/img_cards/imgTimeline17-3.png","");
-- insert into linea_del_tiempo values(0, "2016-01-01","Aula Samsung","La empresa Samsung puso en operación su aula digital 'Samsung Smart School Solution', con el propósito de innovar en el desarrollo y aprendizaje de los alumnos a través de la tecnología.","public_html/img/img_cards/imgTimeline18-1.jpg","","","");
-- insert into linea_del_tiempo values(0, "2017-01-01","Bachillerato General Polivirtual","Se inicia el primersemestre del Polivirtual, para apoyar a los estudiantes que no cuentan con el tiempo o no se les es posible la educación presencial.","public_html/img/img_cards/imgTimeline19-1.png","","","");
-- insert into linea_del_tiempo values(0, "2021-01-01","Instauración de la carrera Técnica en Mecatrónica","Se implementa la carrera de Técnico en Mecatrónica, con el objetivo de formar técnicos que desarrollen las competencias necesarias para la integración de tecnologías de las áreas mecánica, eléctrica, electrónica, computacional y automatización en el diseño de modelos y prototipos mecatrónicos.","public_html/img/img_cards/imgTimeline20-1.png","","","");

-- -----Infomacion de Mamparas--------

-- insert into linea_del_tiempo values(0,"1935-01-01","Seleccion del Plantel","El ingeniero Bátiz como jefe del DETIC, eligió una antigua construcción en la calle de Mar Mediterráneo 227, para establecer la Escuela de Preaprendizaje núm. 3, antecedente académico de este CECyT, cuyos talleres eran de Electricidad, de Carpintería, y los de Hojalatería y de Ajuste.","","","","");
-- insert into linea_del_tiempo values(0,"1936-01-02","Inicio de las actividades del IPN","El general Lázaro Cárdenas informó el inicio de las actividades del IPN, siendo Juan de Dios Bátiz el primer Director General. Durante ese año la Prevocacional 3 crea su primer reglamento.","","","","");
-- insert into linea_del_tiempo values(0,"1940-01-01","Restructuracion del plan de estudios en Escuelas Prevocacionales"," Al restructurarse el Departamento de Enseñanza Técnica Industrial y Comercial, el plan de estudios de las Escuelas Prevocacionales cambió de dos a tres años. También se instituyó la primera Sociedad de Padres de Familia. Al final de la década de los cuarenta, nuestra escuela acogió en su inicio a los dos primeros grupos de la Vocacional que alimentaría a la Escuela Superior de Ingeniería Química e Industrias Extractivas, hoy CECyT “Estanislao Ramírez Ruiz.”","","","","");
-- insert into linea_del_tiempo values(0,"1952-02-01","Inicio de Obras de transformacion del edificio","Se iniciaron obras de transformación del edificio, como los nuevos salones de Dibujo y el Taller de Hojalatería, y se instaló el laboratorio de Física. Se iniciaron actividades artísticas, culturales y deportivas que contribuyeron en la formación integral del estudiante. En esa misma etapa se acondicionó la antigua capilla y se le dio funcionalidad como sala de proyecciones documentales para ser usada por los estudiantes.","","","","");
-- insert into linea_del_tiempo values(0,"1955-01-01","Integracion del Consejo Técnico Consultivo","Se integró el Consejo Técnico Consultivo, el cual ha funcionado con toda regularidad; además se creó el Departamento de Orientación Educativa. ","","","","");
-- insert into linea_del_tiempo values(0,"1957-03-16","Acuerdo de Compra-Venta","Se firmó el acuerdo de compra-venta con la señora Martha Salinas de Ortiz Mena, quien era la propietaria del predio, que ocupaba la escuela, mismo que se vendió en la cantidad de 1 920 270 pesos","","","","");
-- select * from linea_del_tiempo;

-- insert into fototeca values (0,'Imagen 1', 'Descripcion Imagen 1', '2016-06-25',  'fototecaImg/batiz2.jpg');
-- insert into fototeca values (0,'Imagen 2', 'Descripcion Imagen 2', '2016-06-24', 'fototecaImg/batiz3.jpg');

-- insert into fototeca values (0,'Imagen 3', 'Descripcion Imagen 3', '2017-06-25', 'fototecaImg/batiz2.jpg');
-- insert into fototeca values (0,'Imagen 4', 'Descripcion Imagen 4', '2017-06-24', 'fototecaImg/batiz3.jpg');


-- insert into fototeca values (0,'Imagen 5', 'Descripcion Imagen 5', '2015-06-25', 'fototecaImg/batiz2.jpg');
-- insert into fototeca values (0,'Imagen 6', 'Descripcion Imagen 6', '2015-06-24', 'fototecaImg/batiz3.jpg');

-- insert into fototeca values (0,'Imagen 7', 'Descripcion Imagen 7', '2018-06-25', 'fototecaImg/batiz2.jpg');
-- insert into fototeca values (0,'Imagen 8', 'Descripcion Imagen 8', '2018-06-24', 'fototecaImg/batiz3.jpg');
