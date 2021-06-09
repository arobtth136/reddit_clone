insert into usuarios(nombreUsuario, password, fechaNacimiento, fotoPerfil, correo) values
('gatoSexo99','$2y$10$tLtgGfH0XXUzj/mC/TJz1ef4nseqwe36DhAO12FKyWPayt2xgDbma','1999-8-23','https://photos.app.goo.gl/gELCQ4ZvkNTv1VgW6','gato_sexo@email.com'),
('maikiDios','$2y$10$xZYf/tl/Gr/k6KZKNgjhceJbWzc/qsl76Ualber93jfLVbkEx9otK','1999-7-15','https://photos.app.goo.gl/HaLnKp18zjN5C3G97','maiki@email.com');

insert into comunidades(nombre, icono, fotoGrupo) values
('chemsificadores','https://i.pinimg.com/236x/88/8e/0b/888e0b9184b7ae6bf9750f9025f8f9aa.jpg','https://wall.alphacoders.com/big.php?i=771197'),
('futbol','https://image.flaticon.com/icons/png/512/188/188864.png','https://wall.alphacoders.com/big.php?i=1147654'),
('overwatch','https://smallimg.pngkey.com/png/small/14-142320_i-love-this-d-overwatch-dva-icon.png','https://wall.alphacoders.com/big.php?i=712161');

insert into posts(fechaPost,titulo,texto,usuario,comunidad,likes) values
(now(),'Hola','Hola este es un post de prueba je relaciones sexuales',1,1,5),
(now(),'que tal¿','Mi primer registro desde MySQL ¿Ahora que?',2,2,-3);

create or replace view vista_posts As
select posts.id as id, fechaPost, imagenes, titulo, texto, likes, c.nombre as comunidad, u.nombreUsuario as usuario
from posts
         inner join comunidades c on posts.comunidad = c.id
         inner join usuarios u on posts.usuario = u.id where c.deleted_at is null order by fechaPost desc;

drop procedure if exists actividad_posts_usuario;
create procedure actividad_posts_usuario(in usuario_id int)
begin
    SET sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
    select posts.id as id, fechaPost, imagenes, titulo, texto, likes, c.nombre as comunidad, u.nombreUsuario as usuario,
           if(count((select user_id from user_like_post where user_id = usuario_id and post_id = posts.id group by post_id)) > 0, 1, 0) as 'like',
           if(count((select user_id from user_dislike_post where user_id = usuario_id and post_id = posts.id group by post_id)) > 0, 1, 0) as 'dislike'
    from posts
             inner join comunidades c on posts.comunidad = c.id
             inner join usuarios u on posts.usuario = u.id where c.deleted_at is null group by fechaPost desc;
end;