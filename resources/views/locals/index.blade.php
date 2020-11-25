@extends('layouts.app')

@section('title', 'Locals_index')

@section('content')
<a href="{{ route('locals.create') }}" class="btn btn-success">Inserir Local</a>

 @if(session()->get('success'))
    <div class="alert alert-success mt-3">
      {{ session()->get('success') }}  
    </div>
@endif

<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th width="5%">ID</th>
      <th width="50%">Local</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
   @foreach($locals as $local)
    <tr>
      <td>{{ $local->id }}</td>
      <td>{{ $local->nome }}</td>
      <td class="table-buttons">
        <a href="{{ route('locals.edit', $local) }}" class="btn btn-primary">
          <i class="fa fa-pencil" ></i> Editar
        </a>
        <a href="{{ route('talhaos.index', $local) }}" class="btn btn-success">
        <i class="fa fa-eye" ></i> Talhões
        </a>
        <form method="POST" action="{{ route('locals.destroy', $local) }}">
         @csrf
         @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash"></i> Deletar
            </button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection