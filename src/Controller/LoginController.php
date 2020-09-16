<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;

class LoginController {
    public function index(Security $security) {
        $user = $security->getUser();

        if ($user) {
            $name = $user->getUsername();
            return new Response(<<<HTML
<div>Current user: {$name}</div>
<a href="/logout">Logout</a>
HTML
);
        } else {
            return new Response(<<<HTML
<form action="/login_check" method="post">
<input type="text" name="_username" placeholder="Username">
<input type="password" name="_password" placeholder="Password">
<input type="checkbox" id="remember_me" name="_remember_me" checked/>
<label for="remember_me">Keep me logged in</label>
<input type="submit" />
</form>

HTML
            );
        }
    }

    public function login() {
        throw new \LogicException("Handled by authenticator");
    }

    public function logout() {
        throw new \LogicException("Handled by authenticator");
    }
}