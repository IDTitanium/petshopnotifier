<?php

namespace IDTitanium\PetShopNotifier\Tests;

use IDTitanium\PetShopNotifier\PetShopNotifierServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
        PetShopNotifierServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}
