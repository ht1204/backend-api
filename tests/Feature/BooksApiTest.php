<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_get_all_books()
    {
        $books = Book::Factory(4)->create();
        $response = $this->getJson(route('books.index'));

        $response->assertJsonFragment([
            'title' => $books[0]->title
        ])
            ->assertJsonFragment([
                'title' => $books[1]->title
            ]);
    }

    /** @test */
    function can_get_one_book()
    {
        $book = Book::Factory()->create();
        $response = $this->getJson(route('books.show', $book));
        $response->assertJsonFragment([
            'title' => $book->title
        ]);
    }

    /** @test */
    function can_create_one_book()
    {
        $this->postJson(route('books.store'), [])
            ->assertJsonValidationErrorFor('title');

        $this->postJson(route('books.store'), [
            'title' => 'MVC pros and cons'
        ])->assertJsonFragment([
            'title' => 'MVC pros and cons'
        ]);

        $this->assertDatabaseHas('books', [
            'title' => 'MVC pros and cons'
        ]);
    }

    /** @test */
    function can_update_books()
    {
        $book = Book::factory()->create();

        $this->patchJson(route('books.update', $book), [])
            ->assertJsonValidationErrorFor('title');

        $this->patchJson(route('books.update', $book), [
            'title' => 'Edited Book'
        ])->assertJsonFragment([
            'title' => 'Edited Book'
        ]);
    }
    /** @test */
    function can_delete_books()
    {
        $book = Book::factory()->create();

        $this->deleteJson(route('books.destroy', $book))
            ->assertNoContent();

        $this->assertDatabaseCount('books', 0);
    }
}
