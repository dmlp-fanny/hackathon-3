<x-layout>
<h2>{{$search_animal->name}}</h2>
<img src="/images/pets/{{$search_animal->image->path}}" alt="">
 <li>Breed: {{$search_animal->breed}}</li>
 <li>Age: {{$search_animal->age}}</li>
 <li>Weight: {{$search_animal->weight}}</li>
 
<h2>Owner information</h2>
<p>Name: {{$search_animal->owner->first_name . ' ' . $search_animal->owner->surname}}</p>




</x-layout>