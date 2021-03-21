<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    /**
     * Ce Test permet de vérifier que la fonction index return une réponse avec un status 200
     */
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Ce Test permet de vérifier que le contenu returner par la fonction index contient
     * un h1 avec le texte Bienvenu
     */
    public function testReturnIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertSelectorTextContains('h1', 'Bienvenu');
    }
}
