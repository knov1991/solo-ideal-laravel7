@extends('layouts.app')

@section('nome', 'Editar Local '.$local->nome)

@section('content')
<div class="row">
<div class="col-lg-6 mx-auto">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('locals.update', $local) }}">
     @csrf
     @method('PATCH') 
        <div class="form-group">
            <label for="local-nome">Local</label>
            <input type="text" name="nome" value="{{ $local->nome }}" class="form-control" id="local-nome">
        </div>
        <button type="submit" class="btn btn-success">Editar</button>
    </form>
</div>
</div>
@endsection