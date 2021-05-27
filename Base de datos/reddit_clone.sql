use reddit_clone;

create table usuarios(
    id int not null unique auto_increment,
    nombreUsuario varchar(64) not null unique ,
    password blob not null ,
    fechaNacimiento date not null ,
    fotoPerfil varchar(128),
    correo varchar(255),
    PRIMARY KEY (id)
);

create table comunidades(
    id int not null  unique auto_increment,
    nombre varchar(255) unique,
    fotoGrupo varchar(128),
    PRIMARY KEY (id)
);

create table posts(
    id int not null unique auto_increment,
    fechaPost date not null,
    imagenes json,
    texto text not null,
    usuario int not null,
    comunidad int not null,
    likes int not null default 0,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) references usuarios(id),
    FOREIGN KEY (comunidad) REFERENCES comunidades(id)
);

create table comentarios(
    id int not null unique auto_increment,
    texto text,
    post int not null ,
    usuario int not null,
    comunidad int not null,
    likes int not null,
    respuesta int null,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) references usuarios(id),
    FOREIGN KEY (comunidad) REFERENCES comunidades(id)
);

create table usuariosEnComunidad(
    usuario int not null,
    comunidad int not null,
    FOREIGN KEY (usuario) references usuarios(id),
    FOREIGN KEY (comunidad) references comunidades(id)
);