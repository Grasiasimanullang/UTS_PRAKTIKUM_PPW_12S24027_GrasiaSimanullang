<x-layout title="Tambah laboratorium">
    <h3 class="mb-3">Tambah laboratorium</h3>
    <form action="{{ route('laboratorium.store') }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @include('laboratorium._form')
    </form>
</x-layout>