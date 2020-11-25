@extends('layouts.app')

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

    <form method="POST" action="{{ route('analises.update', ['talhao_id' => $analise->talhao_id, 'id' => $analise->id]) }}">
     @csrf
     @method('PUT') 
        <div class="form-group">
            <label for="analise-numero">Nº</label>
            <input type="text" name="numero" value="{{ $analise->numero }}" class="form-control" id="analise-numero">
        </div>
        <div class="form-group">
            <label for="analise-data">Data</label>
            <input type="text" name="data" value="{{ $analise->data }}" class="form-control" id="analise-data">
        </div>
        <div class="form-group">
            <label for="analise-ph">PH</label>
            <input type="text" name="ph" value="{{ $analise->ph }}" class="form-control" id="analise-ph">
        </div>
        <div class="form-group">
            <label for="analise-nitrogenio">Nitrogenio</label>
            <input type="text" name="nitrogenio" value="{{ $analise->nitrogenio }}" class="form-control" id="analise-nitrogenio">
        </div>
        <div class="form-group">
            <label for="analise-fosforo">Fosforo</label>
            <input type="text" name="fosforo" value="{{ $analise->fosforo }}" class="form-control" id="analise-fosforo">
        </div>
        <div class="form-group">
            <label for="analise-potassio">Potassio</label>
            <input type="text" name="potassio" value="{{ $analise->potassio }}" class="form-control" id="analise-potassio">
        </div>
        <div class="form-group">
            <label for="analise-calcio">Calcio</label>
            <input type="text" name="calcio" value="{{ $analise->calcio }}" class="form-control" id="analise-calcio">
        </div>
        <div class="form-group">
            <label for="analise-magnesio">Magnesio</label>
            <input type="text" name="magnesio" value="{{ $analise->magnesio }}" class="form-control" id="analise-magnesio">
        </div>
        <div class="form-group">
            <label for="analise-enxofre">Enxofre</label>
            <input type="text" name="enxofre" value="{{ $analise->enxofre }}" class="form-control" id="analise-enxofre">
        </div>
        <div class="form-group">
            <label for="analise-boro">Boro</label>
            <input type="text" name="boro" value="{{ $analise->boro }}" class="form-control" id="analise-boro">
        </div>
        <div class="form-group">
            <label for="analise-cobre">Cobre</label>
            <input type="text" name="cobre" value="{{ $analise->cobre }}" class="form-control" id="analise-cobre">
        </div>
        <div class="form-group">
            <label for="analise-cloro">Cloro</label>
            <input type="text" name="cloro" value="{{ $analise->cloro }}" class="form-control" id="analise-cloro">
        </div>
        <div class="form-group">
            <label for="analise-ferro">Ferro</label>
            <input type="text" name="ferro" value="{{ $analise->ferro }}" class="form-control" id="analise-ferro">
        </div>
        <div class="form-group">
            <label for="analise-molibdenio">Molibdenio</label>
            <input type="text" name="molibdenio" value="{{ $analise->molibdenio }}" class="form-control" id="analise-molibdenio">
        </div>
        <div class="form-group">
            <label for="analise-zinco">Zinco</label>
            <input type="text" name="zinco" value="{{ $analise->zinco }}" class="form-control" id="analise-zinco">
        </div>

        <button type="submit" class="btn btn-success">Editar</button>
    </form>
</div>
</div>
@endsection