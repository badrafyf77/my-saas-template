<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class Projects extends Component implements HasForms
{
    use InteractsWithForms, AuthorizesRequests;

    public ?array $data = [];
    public string $name = '';
    public ?string $description = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Project Name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save()
    {
        $state = $this->form->getState();
        
        $project = new Project();
        $project->name = $state['name'];
        $project->description = $state['description'] ?? null;
        $project->user_id = auth()->id();
        $project->save();

        $this->reset('name', 'description');
        $this->form->fill();

        Notification::make()
            ->title('Project created successfully!')
            ->success()
            ->send();

        $this->dispatch('project-created');
    }

    public function delete(Project $project)
    {
        $this->authorize('delete', $project);
        
        $project->delete();

        Notification::make()
            ->title('Project deleted successfully!')
            ->success()
            ->send();

        $this->dispatch('project-deleted');
    }

    public function render()
    {
        $projects = auth()->user()->projects()->latest()->get();
        
        return view('livewire.projects', [
            'projects' => $projects
        ]);
    }
}