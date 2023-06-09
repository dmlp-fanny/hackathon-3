<x-layout>
@foreach ($all_owners as $owner)
    <li>{{ $owner->first_name . ' ' . $owner->surname}}</li>
@endforeach
</x-layout>