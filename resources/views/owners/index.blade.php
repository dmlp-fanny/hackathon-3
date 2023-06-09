<x-layout>
@foreach ($all_owners as $owner)
    <li>{{ $owner->first_name . ' ' . $owner->surname}}</li>
    <li>{{ $owner->animals->pluck('name')}}</li>
@endforeach


</x-layout>