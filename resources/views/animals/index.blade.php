<x-layout>
    {{-- @foreach ($all_animals as $animal)
        <li>{{ $animal->name}}  {{$animal->owner->first_name}}</li>
        
    @endforeach --}}
    
    <form action="/animals/search" method="get">
        @csrf
            Animal name: <input type="text" name="name" value="" placeholder="Search">
            <button type="submit">Search</button>
    </form>
    
    @if(isset($results)) 
        @foreach ($results as $result)
            <li><a href="{{$result->id}}"><span class="pet-name">{{ $result->name}}</span>  Owner: {{ $result->owner->first_name . ' ' . $result->owner->surname }}</a> </li>
            
        @endforeach
    @endif


</x-layout>