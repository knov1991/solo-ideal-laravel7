@extends('layouts.app')

@section('title', 'analises.index')

@section('content')
<div class="container">
<a href="{{ route('analises.create', ['local_id' => $local->id, 'talhao_id' => $talhao->id]) }}" class="btn btn-success">Inserir Talhão</a>

 @if(session()->get('success'))
    <div class="alert alert-success mt-3">
      {{ session()->get('success') }}  
    </div>
@endif

<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th width="5%">Nº</th>
      <th width="5%">Data</th>
      <th width="5%">PH</th>
      <th width="5%">Nitrogenio</th>
      <th width="5%">Fosforo</th>
      <th width="5%">Potassio</th>
      <th width="5%">Calcio</th>
      <th width="5%">Magnesio</th>
      <th width="5%">Enxofre</th>
      <th width="5%">Boro</th>
      <th width="5%">Cobre</th>
      <th width="5%">Cloro</th>
      <th width="5%">Ferro</th>
      <th width="5%">Molibdenio</th>
      <th width="5%">Zinco</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
   @foreach($analises as $analise)
    <tr>
      <td>{{ $analise->numero }}</td>
      <td>{{ $analise->data }}</td>
      <td>{{ $analise->ph }}</td>
      <td>{{ $analise->nitrogenio }}</td>
      <td>{{ $analise->fosforo }}</td>
      <td>{{ $analise->potassio }}</td>
      <td>{{ $analise->calcio }}</td>
      <td>{{ $analise->magnesio }}</td>
      <td>{{ $analise->enxofre }}</td>
      <td>{{ $analise->boro }}</td>
      <td>{{ $analise->cobre }}</td>
      <td>{{ $analise->cloro }}</td>
      <td>{{ $analise->ferro }}</td>
      <td>{{ $analise->molibdenio }}</td>
      <td>{{ $analise->zinco }}</td>
      <td class="table-buttons row">
        <a href="{{ route('analises.edit', $analise) }}" class="btn btn-primary">
          <i class="fa fa-pencil" ></i> Editar
        </a>
        <form method="POST" action="{{ route('analises.destroy', $analise) }}">
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
</div>

<hr>

<div class="container">
  <canvas id="myChart" width="100" height="40"></canvas>
</div>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Ph', 'Nitrogenio', 'Fosforo', 'Potassio', 'Calcio', 'Magnesio', 'Enxofre', 'Boro', 'Cobre', 'Cloro', 'Ferro', 'Molibdenio', 'Zinco'],
        /* datasets: [{
            label: '# of Votes',
            data: [{{ implode(',', $calculoAnalise) }}], */

            datasets: [{
            label: 'Analise',
            data: [{{ implode(',', $calculoAnalise) }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }, {
            label: 'Ideal',
            data: [5.5, 10, 30, 3, 40, 8, 15, 0.6, 0.8, 10, 10, 15, 1.2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>


@endsection