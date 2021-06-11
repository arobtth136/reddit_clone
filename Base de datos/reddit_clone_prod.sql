drop database if exists u117281852_w1202;
create database if not exists u117281852_w1202;
use u117281852_w1202;

create table usuarios(
    id int not null unique auto_increment,
    nombreUsuario varchar(64) not null unique ,
    password blob not null ,
    fechaNacimiento date not null ,
    fotoPerfil varchar(128),
    correo varchar(255),
    deleted_at timestamp null,
    PRIMARY KEY (id)
);

create table comunidades(
    id int not null  unique auto_increment,
    nombre varchar(255) unique,
    icono varchar(255),
    fotoGrupo varchar(255),
    deleted_at timestamp null,
    PRIMARY KEY (id)
);

create table posts(
    id int not null unique auto_increment,
    fechaPost date not null,
    imagenes json,
    titulo varchar(255) not null,
    texto text not null,
    usuario int not null,
    comunidad int not null,
    likes int not null default 0,
    deleted_at timestamp null,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) references usuarios(id),
    FOREIGN KEY (comunidad) REFERENCES comunidades(id)
);

create table user_like_post(
    post_id int not null,
    user_id int not null,
    FOREIGN KEY (post_id) references posts(id),
    FOREIGN KEY (user_id) references usuarios(id)
);

create table user_dislike_post(
    post_id int not null,
    user_id int not null,
    FOREIGN KEY (post_id) references posts(id),
    FOREIGN KEY (user_id) references usuarios(id)
);

create table comentarios(
    id int not null unique auto_increment,
    texto text,
    post int not null ,
    usuario int not null,
    comunidad int not null,
    likes int not null,
    respuesta int null,
    deleted_at timestamp null,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) references usuarios(id),
    FOREIGN KEY (comunidad) REFERENCES comunidades(id)
);

create table usuariosEnComunidad(
    usuario int not null,
    comunidad int not null,
    deleted_at timestamp null,
    FOREIGN KEY (usuario) references usuarios(id),
    FOREIGN KEY (comunidad) references comunidades(id)
);