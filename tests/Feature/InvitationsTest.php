<?php

namespace Tests\Feature;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_project_can_invite_a_user()
    {
        $project = ProjectFactory::create();

        $project->invite($newUser = factory(User::class)->create());

        $this->signIn($newUser);

        // action is a diffrent way to giving a route; laravel automatically also takes $project->id from $project
        $this->post(action('ProjectTasksController@store', $project), $task = ['body' => 'foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }
}
