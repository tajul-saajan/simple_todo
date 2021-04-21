@if(!$t->completed)
    <span onclick="event.preventDefault(); document.getElementById('form-complete-{{$t->id}}').submit()"
          class="fas fa-check p-2"></span>

    <form style="display:none" id="{{'form-complete-'.$t->id}}" action="{{route('todos.complete', $t->id)}}" method="post">
        @csrf
        @method('put')
    </form>

@else
    <span onclick="event.preventDefault(); document.getElementById('form-incomplete-{{$t->id}}').submit()"
          class="fas fa-check p-2 text-green-400"></span>

    <form style="display:none" id="{{'form-incomplete-'.$t->id}}" action="{{route('todos.incomplete', $t->id)}}" method="post">
        @csrf
        @method('put')
    </form>
@endif
