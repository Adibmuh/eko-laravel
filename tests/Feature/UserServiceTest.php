<?php

namespace Tests\Feature;

use App\Service\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
  private UserService $UserService;

  protected function setUp():void
  {
      parent::setUp();

      $this->UserService = $this->app->make(UserService::class);
  }

  Public function testSample()
  {
      self::assertTrue(true);
  }

}
