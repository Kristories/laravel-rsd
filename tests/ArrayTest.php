<?php

namespace Kristories\Rsd\Tests;

use Kristories\Rsd\Rsd;

class ArrayTest extends TestCase
{
    /** @test */
    public function it_will_send_a_200()
    {
        config()->set('reserved-subdomains', [
            'driver'     => 'array',
            'subdomains' => [
                'test',
            ],
        ]);

        $crawler = $this->call('GET', '/');

        $this->assertEquals(200, $crawler->getStatusCode());
    }

    /** @test */
    public function it_will_send_a_404()
    {
        config()->set('reserved-subdomains', [
            'driver'     => 'array',
            'subdomains' => [
                'invalid',
            ],
        ]);

        $crawler = $this->call('GET', '/');

        $this->assertEquals(404, $crawler->getStatusCode());
    }
}
