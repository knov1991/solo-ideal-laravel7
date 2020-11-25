@extends('layouts.app')

@section('title', 'talhaos.index')

@section('content')
<a href="{{ route('talhaos.create', $local->id) }}" class="btn btn-success">Inserir Talhão</a>

 @if(session()->get('success'))
    <div class="alert alert-success mt-3">
      {{ session()->get('success') }}  
    </div>
@endif

<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th width="5%">ID</th>
      <th width="50%">Talhão</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
   @foreach($talhaos as $talhao)
    <tr>
      <td>{{ $talhao->id }}</td>
      <td>{{ $talhao->nome }}</td>
      <td class="table-buttons">
        <a href="{{ route('talhaos.edit', $talhao) }}" class="btn btn-primary">
          <i class="fa fa-pencil" ></i> Editar
        </a>
        <a href="{{ route('analises.index', ['local_id' => $talhao->local_id , 'talhao_id' => $talhao->id]) }}" class="btn btn-success">
          <i class="fa fa-eye"></i> Analises
        </a>
        <form method="POST" action="{{ route('talhaos.destroy', $talhao) }}">
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