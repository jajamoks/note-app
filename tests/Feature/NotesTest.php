<?php

namespace Tests\Feature;

use App\Note;
use App\User;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotesTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_list_of_notes_can_be_fetched_for_the_authenticated_user()
    {
        $user = factory(User::class)->create();
        $anotherUser = factory(User::class)->create();

        $note = factory(Note::class)->create(['user_id' => $user->id]);
        $anotherNote = factory(Note::class)->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/notes?api_token=' . $user->api_token);

        $response->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    [
                        "data" => [
                            'note_id' => $note->id
                        ]
                    ]
                ]
            ]);
    }

    /** @test */
    public function an_unauthenticated_user_should_redirected_to_login()
    {
        $response = $this->post('/api/notes',
            array_merge($this->data(), ['api_token' => '']));

        $response->assertRedirect('/login');
        $this->assertCount(0, Note::all());
    }

    /** @test */
    public function an_authenticated_user_can_add_a_note()
    {
        $response = $this->post('/api/notes', $this->data());

        $note = Note::first();

        $this->assertEquals('Test Name', $note->name);
        $this->assertEquals('Description here', $note->description);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'data' => [
                'note_id' => $note->id,
            ],
            'links' => [
                'self' => $note->path(),
            ]
        ]);
    }

    /** @test */
    public function fields_are_required()
    {
        collect(['name', 'description'])
            ->each(function ($field) {
                $response = $this->post('/api/notes',
                    array_merge($this->data(), [$field => '']));

                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Note::all());
            });
    }


    /** @test */
    public function a_note_can_be_retrieved()
    {
        $note = factory(Note::class)->create(['note_id' => $this->user->id]);

        $response = $this->get('/api/notes/' . $note->id . '?api_token=' . $this->user->api_token);

        $response->assertJson([
            'data' => [
                'note_id' => $note->id,
                'name' => $note->name,
                'description' => $note->email,
                'last_updated' => $note->updated_at->diffForHumans(),
            ]
        ]);
    }

    /** @test */
    public function only_the_users_notes_can_be_retrieved()
    {
        $note = factory(Note::class)->create(['user_id' => $this->user->id]);

        $anotherUser = factory(User::class)->create();

        $response = $this->get('/api/notes/' . $note->id . '?api_token=' . $anotherUser->api_token);

        $response->assertStatus(403);
    }

    /** @test */
    public function a_note_can_be_patched()
    {
        $note = factory(Note::class)->create(['user_id' => $this->user->id]);

        $response = $this->patch('/api/notes/' . $note->id, $this->data());

        $note = $note->fresh();

        $this->assertEquals('Test Name', $note->name);
        $this->assertEquals('Description here', $note->description);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                'note_id' => $note->id,
            ],
            'links' => [
                'self' => $note->path(),
            ]
        ]);
    }


    /** @test */
    public function only_the_owner_can_delete_the_note()
    {
        $note = factory(Note::class)->create();

        $anotherUser = factory(User::class)->create();

        $response = $this->delete('/api/notes/' . $note->id,
            ['api_token' => $this->user->api_token]);

        $response->assertStatus(403);
    }

    private function data()
    {
        return [
            'name' => 'Test Name',
            'description' => 'Description here',
            'api_token' => $this->user->api_token
        ];
    }
}
