<?php
require_once 'models/user.php';
require_once 'models/post.php';
trait Gates {
    public function can_edit_post(Post $post): bool
    {
        $user = new User();
        return $user->id === $post->usuario;
    }

    public function user_signed_in(): bool
    {
        return $_SESSION['user'] != null;
    }
}