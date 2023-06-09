<x-layout>

<h1>Add a New Pet</h1>

    <form action="" method="GET">
        <label for="name">Who is THE owner?</label><br>
        <input type="text" name="owner">
        <button>Search</button>
    </form>

@if (isset($owners))
        @foreach ($owners as $owner)
            <li><?= "<a href='?id={$owner->id}'>$owner->first_name $owner->surname </a>"?></li>
        @endforeach

@elseif(isset($owner) || isset($animal->id))

    <label for="name">Owner Name:</label><br>
    <input type="text" name="fname" value="{{old('name', $owner->first_name)}}"> <br>  
    <input type="text" name="lname" value="{{old('surname', $owner->surname)}}"> <br>  

@if ($animal->id)
        <form action="{{route('animals.update', $animal->id) }}" method="post">
        @method('put')
@else
        <form action="{{route('animals.store')}}" method="post">
@endif

@csrf
    

    <br>
    <input type="hidden" name="owner_id" value="{{ old('owner_id', $owner->id ?? $animal->owner_id) }}"> 
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{old('name', $animal->name)}}"> 
    <label for="species">Species:</label>
    <input type="text" name="species" value="{{old('species', $animal->species)}}"> 
    <label for="breed">Breed:</label>
    <input type="text" name="breed" value="{{old('breed', $animal->breed)}}"> 
    <label for="age">Age:</label>
    <input type="number" name="age" value="{{old('age', $animal->age)}}"> 
    <label for="weight">Weight:</label><br>
    <input type="number" name="weight" value="{{old('weight', $animal->weight)}}"> 

     <button>Submit</button>
</form>
@endif
</x-layout>