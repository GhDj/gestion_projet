@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Bienvenue Admin</div>
                    <div class="panel-body">





<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<a href="{{ url('/register') }}">Ajouter un personnel</a>
                        <br>
<a href="{{ url('/user') }}"> Liste des personnel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection