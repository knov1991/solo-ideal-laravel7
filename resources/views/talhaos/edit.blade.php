@extends('layouts.app')

@section('nome', 'Editar Talhão '.$talhao->nome)

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

    <form method="POST" action="{{ route('talhaos.update', ['local_id' => $talhao->local_id, 'id' => $talhao->id]) }}">
     @csrf
     @method('PUT') 
        <div class="form-group">
            <label for="talhao-nome">Talhão</label>
            <input type="text" name="nome" value="{{ $talhao->nome }}" class="form-control" id="talhao-nome">
        </div>
        <button type="submit" class="btn btn-success">Editar</button>
    </form>
</div>
</div>
@endsection