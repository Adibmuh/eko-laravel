<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
  private UserService $userService;

  protected function setUp():void
  {
      parent::setUp();

      $this->userService = $this->app->make(UserService::class);
  }

  public function testLoginSuccess()
  {
    self::assertTrue($this->userService->login("Khannedy", "rahasia"));
  }

  public function testLoginNotFound()
  {
    self::assertFalse($this->userService->login("eko", "eko"));
  }

  public function testLoginWrongPassword()
  {
    self::assertFalse($this->userService->login("Khanndey", "salah"));
  }

}