<x-layout>

<h1>Add a New Pet</h1>

@if ($animal->id)
        <form action="" method="post">
        @method('put')
@else
        <form action={{route('animals.store') }} method="post">
@endif

    @csrf
    <p>Who is an owner?</p>

    <form action="">
        <input type="text">
        
    </form>
    
    <label for="name">Name:</label><br>
    <input type="text" name="name" value="{{old('name', $animal->name)}}"> <br>
    <label for="species">Species:</label><br>
    <input type="text" name="species" value="{{old('species', $animal->species)}}"> <br>
    <label for="breed">Breed:</label><br>
    <input type="email" name="breed" value="{{old('breed', $animal->breed)}}"> <br>
    <label for="age">Age:</label><br>
    <input type="number" name="age" value="{{old('age', $animal->age)}}"> <br>
    <label for="weigth">Weigth:</label><br>
    <input type="number" name="weigth" value="{{old('weigth', $animal->weigth)}}"> <br>

     <button>Submit</button>
</form>
</x-layout>