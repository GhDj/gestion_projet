



<h1> {{ $r->designation }}

</h1>
<p> Date Reunion :{{ $r->dateReunion }}</p>
<p> Emplacement : {{ $r->Emplacement }}</p>
<p> Time : {{ $r->timeReunion }}</p>

<li>
    @foreach($ru as $r)
        @foreach($user as $u)
    @if($r->id_user==$u->id)
        {{ $u->name }}<br>
    @endif
            @endforeach
        @endforeach
</li>
@if(\Illuminate\Support\Facades\Auth::user()->role==1)
{!! Form::open(array('route' => 'reunionUser.store', 'method' => 'POST')) !!}


<li> <select name="id_user">
        @foreach($user as $u)
            <option value="{{ $u->id }}"> {{ $u->name }} </option>
        @endforeach
    </select>
</li>

<input type="hidden" name="id_reunion" value="{{ $id }}">
{!! Form::submit() !!}
{!! Form::close() !!}

<a href="/reunion/{{ $r->id }}/edit"> Modifier</a>

@endif