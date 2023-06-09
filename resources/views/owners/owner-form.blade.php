<x-layout>

<h1>Add a New Client</h1>


@if ($owner->id)
        <form action="{{route('owners.update', $owner->id) }}" method="post">
        @method('put')
@else
        <form action="{{route('owners.store') }}" method="post">
@endif

    @csrf
    <label for="fname">First Name:</label><br>
    <input type="text" name="first_name" value="{{old('first_name', $owner->first_name)}}"> <br>
    <label for="fname">Surname:</label><br>
    <input type="text" name="surname" value="{{old('surname', $owner->surname)}}"> <br>
    <label for="fname">E-mail:</label><br>
    <input type="email" name="email" value="{{old('email', $owner->email)}}"> <br>
    <label for="fname">Address:</label><br>
    <input type="text" name="address" value="{{old('address', $owner->address)}}"> <br>

     <button>Submit</button>
</form>
</x-layout>