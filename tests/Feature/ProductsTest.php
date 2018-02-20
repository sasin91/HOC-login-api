<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_can_list_purchasable_products()
    {
        factory(Product::class)->states('published')->create();

        $this->signIn(factory(User::class)->create());

        $this->get(route('product.index'))
            ->assertSuccessful()
            ->assertCount(1);
    }

    /** @test */
    public function cannot_view_unpublished_products()
    {
        $this->enableExceptionHandling();

        $product = factory(Product::class)->create();

        $this->signIn(factory(User::class)->create());

        $this->get(route('product.show', $product))
            ->assertStatus(404);
    }

    /** @test */
    public function can_show_details_about_a_product()
    {
        $product = factory(Product::class)->states('published')->create();

        $this->signIn(factory(User::class)->create());

        $this->get(route('product.show', $product))
            ->assertSuccessful();
    }

    /** @test */
    public function can_create_products()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        $user->givePermissionTo('create products');

        $this->signIn($user);

        $this->postJson(route('product.store'), [
            'name' => 'Eureka',
            'reusable' => true,
            'is_virtual' => true,
            'type' => 'Fantasy world',
            'command' => 'enter:forbidden-world',
            'value' => 'Eureka',
            'cost' => 9999,
            'currency' => 'Rubbles',
            'lifetime' => '15 minutes',
            'description' => 'Enter teh magickal lands of Eureka.',
        ])->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'published_at' => null,
            'name' => 'Eureka',
            'reusable' => true,
            'is_virtual' => true,
            'type' => 'Fantasy world',
            'command' => 'enter:forbidden-world',
            'value' => 'Eureka',
            'cost' => 9999,
            'currency' => 'Rubbles',
            'lifetime' => '15 minutes',
            'description' => 'Enter teh magickal lands of Eureka.',
        ]);
    }

    /** @test */
    public function can_published_our_product()
    {
        $this->disableExceptionHandling();

        /** @var User $user */
        $user = factory(User::class)->create();
        $user->givePermissionTo('update products');

        $product = factory(Product::class)->create();

        $this->signIn($user);

        $this->putJson(route('product.publish'), ['id' => $product->id, 'date' => '2017-08-29 20:07:30'])
            ->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'published_at' => '2017-08-29 20:07:30'
        ]);
    }
}
