<x-app-layout>
    <x-slot name="header">
        @foreach ($users as $user)
        <div class="border-2 border-red-400 p-3 mb-2">
            <p>id: {{ $user->id }}</p>
            <p>Имя: {{ $user->name }}</p>
            
        </div>
        @endforeach
    </x-slot>
</x-app-layout>