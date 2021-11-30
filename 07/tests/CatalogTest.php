<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CatalogTest extends WebTestCase
{
  public function testCatalog()
  {
    $client = static::createClient();
    $client->request('GET', '/Catalog');
    $this->assertSelectorTextContains('title', 'Catalog');
  }

  public function testProduct()
  {
    $client = static::createClient();
    $client->request('GET', '/Product/1');
    $this->assertSelectorTextContains('title', 'Product');
    // $this->assertSelectorTextContains('title', 'Catalog');
  }
}