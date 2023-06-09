<x-layout>
    @foreach ($all_animals as $animal)
        <li>{{ $animal->name}}  {{$animal->owner->first_name}}</li>
        
    @endforeach
    
    
    </x-layout>