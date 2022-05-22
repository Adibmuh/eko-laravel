<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get(route("login"))
            ->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post(route("authenticated"), [
            "user" => "Khannedy",
            "password" => "rahasia"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "Khannedy");
    }

    public function testLoginValidationError()
    {
        $this->post(route("login"), [])
            ->assertSeeText("User or password is required");
    }

    public function testLoginFailed()
    {
        $this->post(route("login"), [
            "user" => "wrong",
            "password" => "wrong"
        ])->assertSeeText("user or password wrong");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "Khannedy"
        ])->post("logout")
            ->assertRedirect("/")
            ->assertSessionMissing("user");
    }
}
