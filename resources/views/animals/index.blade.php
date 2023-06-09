<x-layout>
    {{-- @foreach ($all_animals as $animal)
        <li>{{ $animal->name}}  {{$animal->owner->first_name}}</li>
        
    @endforeach --}}
    
    <form action="/animals/search" method="get">
        @csrf
        <div class="input-group">
            Animal name: <input type="text" name="name" value="" placeholder="Search">
            <br />
            <button type="submit">Search</button>
        </div>
    </form>
    
    @if(isset($results)) 
        @foreach ($results as $result)
            <li><a href="{{$result->id}}">{{ $result->name}} | Owner: {{ $result->owner->first_name . ' ' . $result->owner->surname }}</a> </li>
            
        @endforeach
    @endif


</x-layout>