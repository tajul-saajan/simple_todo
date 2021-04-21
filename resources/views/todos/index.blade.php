
@extends('todos.layout')

@section('content')
    <div class="flex justify-center mb-4 border-b pb-3 border-gray-400">
        <h1 class="text-2xl">All ToDos</h1>
        <a href="{{route('todos.create')}}" class="mx-5  cursor-pointer ">
            <span class="fas fa-plus-circle py-2 text-blue-400"></span>
        </a>
    </div>
    <x-alert/>
    <ul class="my-5">
        @forelse($todos as $t)
            <li class="flex justify-between py-2 px-4">

                @include('todos.completeButton')

            @if($t->completed)
                    <a href="{{route('todos.show', $t->id)}}" class="line-through cursor-pointer"> {{ $t->title }} </a> <br/>
                    <p class="line-through"> {{ $t->description }} </p>
                @else
                    <a href="{{route('todos.show', $t->id)}}" class="cursor-pointer"> {{ $t->title }} </a> <br/>
                    <p> {{ $t->description }} </p>
                @endif

                <div >
                    <span class=""></span>
                    <a href="{{route('todos.edit',$t)}}"
                       class="fas fa-pen  mx-5 p-2 text-blue-800 cursor-pointer"></a>

                    <span
                        onclick="event.preventDefault();
                        if(confirm('Are you sure want to delete?')){
                            document.getElementById('form-delete-{{$t->id}}').submit()
                        }
                        "
                        class="fas fa-times  mx-5 p-2 text-red-500 cursor-pointer"></span>


                    <form style="display:none" id="{{'form-delete-'.$t->id}}"
                          action="{{route('todos.destroy', $t->id)}}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </div>


            </li>
        @empty
            <p>No Tasks Available. Create One</p>
        @endforelse
    </ul>
@endsection
