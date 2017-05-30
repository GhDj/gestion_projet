
@foreach($chat as $c)
    @if($c->emetteur==\Illuminate\Support\Facades\Auth::user()->id)
        <p style="text-align: right;">{{ $c->contenu }}</p>
        <hr>
        @else
    {{ \App\User::findOrfail($c->emetteur)->name }}:{{ $c->contenu }}<br>
@endif

@endforeach