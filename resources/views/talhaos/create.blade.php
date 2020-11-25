@extends('layouts.app')

@section('title', 'Inserir Talhão')

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

    <form method="POST" action="{{ route('talhaos.store', $local) }}">
     @csrf
        <div class="form-group">
            <label for="local-nome">Talhão</label>
            <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" id="local-nome">
        </div>
        <button type="submit" class="btn btn-success">Inserir Talhão</button>
    </form>
</div>
</div>
@endsection