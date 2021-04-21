@extends('todos.layout')

@section('content')

    <div class="flex justify-center mb-4 border-b pb-3 border-gray-400">
        <h2 class="text-2xl"> {{$todo->title}} </h2>

    </div>

    <p class="pb-6">
        {{$todo->description}}
    </p>


    <a href="{{route('todos.index')}}" class="mx-5 py-2 px-1 bg-blue-400 cursor-pointer rounded text-white">
        Back
    </a>

@endsection
