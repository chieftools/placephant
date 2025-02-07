<?php

declare(strict_types=1);

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class BasicRoutesTest extends TestCase
{
    #[Test]
    public function weCanGetTheHomePage(): void
    {
        // run
        $response = $this->get('/');

        // verify/assert
        $response->assertStatus(200);
    }

    #[Test]
    public function weCanGetTheImageList(): void
    {
        // run
        $response = $this->get(route('imagelist'));

        // verify/assert
        $response->assertStatus(200);
        $response->assertSee('Current ElePHPant photos');
        $response->assertSee('Click on a photo to see the original file, the link will open in a new window.');
    }

    #[Test]
    public function weCanGetTheOptionsPage(): void
    {
        // run
        $response = $this->get(route('options'));

        // verify/assert
        $response->assertStatus(200);
        $response->assertSee('Options with examples');
    }

    #[Test]
    public function weCanGetAnImage(): void
    {
        // run
        $response = $this->get('10');

        // verify/assert
        $response->assertOk();
    }
}
