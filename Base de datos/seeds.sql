insert into usuarios(nombreUsuario, password, fechaNacimiento, fotoPerfil, correo) values
('gatoSexo99','$2y$10$tLtgGfH0XXUzj/mC/TJz1ef4nseqwe36DhAO12FKyWPayt2xgDbma','1999-8-23','https://photos.app.goo.gl/gELCQ4ZvkNTv1VgW6','gato_sexo@email.com'),
('maikiDios','$2y$10$xZYf/tl/Gr/k6KZKNgjhceJbWzc/qsl76Ualber93jfLVbkEx9otK','1999-7-15','https://photos.app.goo.gl/HaLnKp18zjN5C3G97','maiki@email.com');

insert into comunidades(name, fotoGrupo) values
('chemsificadores','https://wall.alphacoders.com/big.php?i=771197'),
('futbol','https://wall.alphacoders.com/big.php?i=1147654'),
('overwatch','https://wall.alphacoders.com/big.php?i=712161');

insert into posts(fechaPost,texto,usuario,comunidad,likes) values
(now(),'Hola este es un post de prueba je relaciones sexuales',1,1,5),
(now(),'Mi primer registro desde MySQL ¿Ahora que?',2,2,-3);