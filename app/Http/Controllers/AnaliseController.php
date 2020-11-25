<?php

namespace App\Http\Controllers;

use App\Models\Analise;
use App\Models\Local;
use App\Models\Talhao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnaliseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($local_id, $talhao_id)
    {
        $local = Local::find($local_id);
        $talhao = Talhao::find($talhao_id);
        $analises = Analise::where('talhao_id','=',$talhao_id)->get();

        return view('analises.index', compact('analises', 'local', 'talhao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local_id, $talhao_id)
    {
        $local = Local::find($local_id);
        $talhao = Talhao::find($talhao_id);
        return view('analises.create', compact('local', 'talhao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $local_id, $talhao_id)
    {
        $request->validate([
            'numero' => 'required|max:10',
            'data' => 'required',
            'ph' => 'required|max:10',
            'nitrogenio' => 'required|max:10',
            'fosforo' => 'required|max:10',
            'potassio' => 'required|max:10',
            'calcio' => 'required|max:10',
            'magnesio' => 'required|max:10',
            'enxofre' => 'required|max:10',
            'boro' => 'required|max:10',
            'cobre' => 'required|max:10',
            'cloro' => 'required|max:10',
            'ferro' => 'required|max:10',
            'molibdenio' => 'required|max:10',
            'zinco' => 'required|max:10'
        ]);

        $analise = new Analise();
        $analise->numero = $request->get('numero');
        $analise->data = $request->get('data');
        $analise->ph = $request->get('ph');
        $analise->nitrogenio = $request->get('nitrogenio');
        $analise->fosforo = $request->get('fosforo');
        $analise->potassio = $request->get('potassio');
        $analise->calcio = $request->get('calcio');
        $analise->magnesio = $request->get('magnesio');
        $analise->enxofre = $request->get('enxofre');
        $analise->boro = $request->get('boro');
        $analise->cobre = $request->get('cobre');
        $analise->cloro = $request->get('cloro');
        $analise->ferro = $request->get('ferro');
        $analise->molibdenio = $request->get('molibdenio');
        $analise->zinco = $request->get('zinco');
        $analise->talhao_id = $talhao_id;

        $analise->save();

        return redirect()->route('analises.index', ['local_id' => $local_id, 'talhao_id' => $talhao_id])->with('success', 'Analise - ' .$analise->numero. ' inserida com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analise  $analise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analise = Analise::find($id);

        return view('analises.show', compact('analise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analise  $analise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analise = Analise::find($id);

        return view('analises.edit', compact('analise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analise  $analise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $talhao_id, $id)
    {
        $request->validate([
            'numero' => 'required|max:10',
            'data' => 'required',
            'ph' => 'required|max:10',
            'nitrogenio' => 'required|max:10',
            'fosforo' => 'required|max:10',
            'potassio' => 'required|max:10',
            'calcio' => 'required|max:10',
            'magnesio' => 'required|max:10',
            'enxofre' => 'required|max:10',
            'boro' => 'required|max:10',
            'cobre' => 'required|max:10',
            'cloro' => 'required|max:10',
            'ferro' => 'required|max:10',
            'molibdenio' => 'required|max:10',
            'zinco' => 'required|max:10'
        ]);

        $analise = Analise::find($id);
        $analise->numero = $request->get('numero');
        $analise->data = $request->get('data');
        $analise->ph = $request->get('ph');
        $analise->nitrogenio = $request->get('nitrogenio');
        $analise->fosforo = $request->get('fosforo');
        $analise->potassio = $request->get('potassio');
        $analise->calcio = $request->get('calcio');
        $analise->magnesio = $request->get('magnesio');
        $analise->enxofre = $request->get('enxofre');
        $analise->boro = $request->get('boro');
        $analise->cobre = $request->get('cobre');
        $analise->cloro = $request->get('cloro');
        $analise->ferro = $request->get('ferro');
        $analise->molibdenio = $request->get('molibdenio');
        $analise->zinco = $request->get('zinco');
        $analise->talhao_id = $talhao_id;
        $analise->save();

        $talhao = Talhao::find($talhao_id);
        $local_id = $talhao->local_id;

        return redirect()->route('analises.index', ['local_id' => $local_id, 'talhao_id' => $talhao_id])->with('success', 'Analise atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analise  $analise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analise = Analise::find($id);
        $talhao = Talhao::find($analise->talhao_id);
        $analise->delete();

        return redirect()->route('analises.index', ['local_id' => $talhao->local_id, 'talhao_id' => $talhao->id])->with('success', 'Analise removida!');
    }
}
