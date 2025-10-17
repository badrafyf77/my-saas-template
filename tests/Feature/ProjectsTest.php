<?php

use App\Models\User;
use App\Models\Project;
use function Pest\Laravel\get;

it('requires authentication to view projects', function () {
    $response = $this->get('/projects');
    $response->assertRedirect('/login');
});

it('can view projects page when authenticated', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/projects');
    $response->assertStatus(200);
});

it('can create a project', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test('projects')
        ->set('data.name', 'Test Project')
        ->set('data.description', 'A test project description')
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('projects', [
        'name' => 'Test Project',
        'description' => 'A test project description',
        'user_id' => $user->id,
    ]);
});

it('can delete a project', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    
    $project = Project::factory()->create(['user_id' => $user->id]);

    Livewire::test('projects')
        ->call('delete', $project->id);

    $this->assertDatabaseMissing('projects', [
        'id' => $project->id,
    ]);
});