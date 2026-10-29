<x-layout title="Edit ruangan_laboratorium">
    <h3 class="mb-3">Edit ruangan_laboratorium</h3>
    <form action="{{ route('laboratorium.update', $laboratorium) }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @method('PUT')
        @include('laboratorium._form')
    </form>
</x-layout>