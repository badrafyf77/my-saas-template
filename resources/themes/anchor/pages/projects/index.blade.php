<?php

use function Laravel\Folio\{middleware, name};

middleware('auth');
name('projects');

?>

<x-layouts.app>
    <x-app.container>
        @livewire('projects')
    </x-app.container>
</x-layouts.app>