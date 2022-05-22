<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response // untuk tampilan login
    {
        return response()
            ->view("user.login", [
                "title" => "login"
            ]); 
    }

    public function dologin(Request $request): Response|RedirectResponse // untuk login aksinya
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // ngecek validate input
        if (empty($user) || empty($password)) {
            return response()->view("user.login", [
                "title" => "login",
                "error" => "User or password is required"
            ]);
        }

        if($this->userService->login($user, $password)){ // jika loginnya berhasil
            $request->session()->put("user", $user);
            return redirect("/");
        }

        // jika tidak berhasil untuk login
        return response()->view("user.login", [
            "title" => "login",
            "error" => "user or password wrong"
        ]);
    }

    public function dologout(Request $request): RedirectResponse // untuk aksi logoutnya
    {
        $request->session()->forget("user");
        return redirect("/");
    }
}
