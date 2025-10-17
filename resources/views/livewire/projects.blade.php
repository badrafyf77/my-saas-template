<div>
    <div class="flex flex-col w-full">
        <div class="w-full mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Projects</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your projects here.</p>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Create Project Form -->
            <div class="lg:col-span-1">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Create New Project</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Add a new project to get started.</p>
                    
                    <form wire:submit.prevent="save" class="mt-4 space-y-4">
                        {{ $this->form }}
                        
                        <div class="flex justify-end">
                            <x-button type="submit">Create Project</x-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Projects List -->
            <div class="lg:col-span-2">
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Your Projects</h3>
                    </div>
                    
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($projects as $project)
                            <div class="px-6 py-4" wire:key="project-{{ $project->id }}">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-base font-medium text-gray-900 dark:text-white">{{ $project->name }}</h4>
                                        @if($project->description)
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($project->description, 100) }}</p>
                                        @endif
                                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">
                                            Created {{ $project->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                    
                                    <div>
                                        <button 
                                            wire:click="delete({{ $project->id }})"
                                            wire:confirm="Are you sure you want to delete this project?"
                                            type="button"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                        >
                                            <x-phosphor-trash class="w-5 h-5" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-12 text-center">
                                <x-phosphor-stack class="w-12 h-12 mx-auto text-gray-400 dark:text-gray-500" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No projects</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new project.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>