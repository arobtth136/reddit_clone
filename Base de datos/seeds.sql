insert into usuarios(nombreUsuario, password, fechaNacimiento, fotoPerfil, correo) values
('gatoSexo99','$2y$10$tLtgGfH0XXUzj/mC/TJz1ef4nseqwe36DhAO12FKyWPayt2xgDbma','1999-8-23','https://photos.app.goo.gl/gELCQ4ZvkNTv1VgW6','gato_sexo@email.com'),
('maikiDios','$2y$10$xZYf/tl/Gr/k6KZKNgjhceJbWzc/qsl76Ualber93jfLVbkEx9otK','1999-7-15','https://photos.app.goo.gl/HaLnKp18zjN5C3G97','maiki@email.com');

insert into comunidades(nombre, icono, fotoGrupo) values
('chemsificadores','https://i.pinimg.com/236x/88/8e/0b/888e0b9184b7ae6bf9750f9025f8f9aa.jpg','https://wall.alphacoders.com/big.php?i=771197'),
('futbol','https://image.flaticon.com/icons/png/512/188/188864.png','https://wall.alphacoders.com/big.php?i=1147654'),
('overwatch','https://smallimg.pngkey.com/png/small/14-142320_i-love-this-d-overwatch-dva-icon.png','https://wall.alphacoders.com/big.php?i=712161');

insert into posts(fechaPost,texto,usuario,comunidad,likes) values
(now(),'Hola este es un post de prueba je relaciones sexuales',1,1,5),
(now(),'Mi primer registro desde MySQL ¿Ahora que?',2,2,-3);