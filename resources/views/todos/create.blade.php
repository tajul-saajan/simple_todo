@extends('todos.layout')

@section('content')

    <div class="flex justify-center mb-4 border-b pb-3 border-gray-400">
        <h2 class="text-2xl">What next you want to do?</h2>

    </div>

    <form action="{{route('todos.store')}}" method="POST" class="py-4">
        @csrf
        <x-alert/>
        <div class="py-1">
            <input type="text" name="title" placeholder="Title" class="border py-2 px-2 rounded-lg">
        </div>
        <div class="py-1">
            <textarea type="text" name="description" placeholder="Description"
                      class="border py-2 px-2 rounded-lg"></textarea>
        </div>
        <div class="py-1">
            <input type="submit" value="Create" class="py-2 rounded-lg border">
        </div>
    </form>

    <a href="{{route('todos.index')}}" class="mx-5 py-2 px-1 bg-blue-400 cursor-pointer rounded text-white">
        Back
    </a>

@endsection
