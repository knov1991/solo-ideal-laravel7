@extends('layouts.app')
<script type="text/javascript">
// inicio - document ready
$(document).ready(function() {
$('#ph, #valor_contrapartida').priceFormat({
        centsLimit: 2,
        prefix : '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    });
});
</script>

@section('title', 'Inserir Analise')

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

    <form method="POST" action="{{ route('analises.store', ['local_id' => $talhao->local_id, 'talhao_id' => $talhao->id]) }}">
     @csrf
        <div class="form-group">
            <label for="numero">Nº</label>
            <input type="number" name="numero" value="{{ old('numero') }}" class="form-control" id="numero">
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" name="data" value="{{ old('data') }}" class="form-control" id="data" maxlength="20" max="9999-12-31">
        </div>
        <div id="ph_campo" class="form-group">
            <label for="ph" id="label_ph">PH</label>
            <input type="text" name="ph" value="{{ old('ph') }}" class="form-control" id="ph" maxlength="10">
        </div>
        <div class="form-group">
            <label for="nitrogenio">Nitrogenio</label>
            <input type="text" name="nitrogenio" value="{{ old('nitrogenio') }}" class="form-control" id="nitrogenio" maxlength="10">
        </div>
        <div class="form-group">
            <label for="fosforo">Fosforo</label>
            <input type="text" name="fosforo" value="{{ old('fosforo') }}" class="form-control" id="fosforo" maxlength="10">
        </div>
        <div class="form-group">
            <label for="potassio">Potassio</label>
            <input type="text" name="potassio" value="{{ old('potassio') }}" class="form-control" id="potassio" maxlength="10">
        </div>
        <div class="form-group">
            <label for="calcio">Calcio</label>
            <input type="text" name="calcio" value="{{ old('calcio') }}" class="form-control" id="calcio" maxlength="10">
        </div>
        <div class="form-group">
            <label for="magnesio">Magnesio</label>
            <input type="text" name="magnesio" value="{{ old('magnesio') }}" class="form-control" id="magnesio" maxlength="10">
        </div>
        <div class="form-group">
            <label for="enxofre">Enxofre</label>
            <input type="text" name="enxofre" value="{{ old('enxofre') }}" class="form-control" id="enxofre" maxlength="10">
        </div>
        <div class="form-group">
            <label for="boro">Boro</label>
            <input type="text" name="boro" value="{{ old('boro') }}" class="form-control" id="boro" maxlength="10">
        </div>
        <div class="form-group">
            <label for="cobre">Cobre</label>
            <input type="text" name="cobre" value="{{ old('cobre') }}" class="form-control" id="cobre" maxlength="10">
        </div>
        <div class="form-group">
            <label for="cloro">Cloro</label>
            <input type="text" name="cloro" value="{{ old('cloro') }}" class="form-control" id="cloro" maxlength="10">
        </div>
        <div class="form-group">
            <label for="ferro">Ferro</label>
            <input type="text" name="ferro" value="{{ old('ferro') }}" class="form-control" id="ferro" maxlength="10">
        </div>
        <div class="form-group">
            <label for="molibdenio">Molibdenio</label>
            <input type="text" name="molibdenio" value="{{ old('molibdenio') }}" class="form-control" id="molibdenio" maxlength="10">
        </div>
        <div class="form-group">
            <label for="zinco">Zinco</label>
            <input type="text" name="zinco" value="{{ old('zinco') }}" class="form-control" id="zinco" maxlength="10">
        </div>
        <button type="submit" class="btn btn-success">Inserir Analise</button>
    </form>
</div>
</div>
@endsection