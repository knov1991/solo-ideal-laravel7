<?php

namespace App\Http\Controllers;

use App\Models\Talhao;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalhaoController extends Controller
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
    public function index($local_id)
    {
        $local = Local::find($local_id);
        $talhaos = Talhao::where('local_id','=',$local_id)->get();

        return view('talhaos.index', compact('talhaos', 'local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local_id)
    {
        $local = Local::find($local_id);
        return view('talhaos.create', compact('local'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $local_id)
    {
        $request->validate([
            'nome'=> 'required|max:255'
        ]);

        /* $talhao = new Talhao([
            'local_id' => $local,
            'nome' => $request->get('nome')
        ]); */
        $talhao = new Talhao();
        $talhao->nome = $request->get('nome');
        $talhao->local_id = $local_id;

        $talhao->save();

        return redirect()->route('talhaos.index', $local_id)->with('success', 'Talhão - ' .$talhao->nome. ' inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talhao  $talhao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $talhao = Talhao::find($id);

        return view('talhaos.show', compact('talhao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talhao  $talhao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talhao = Talhao::find($id);

        return view('talhaos.edit', compact('talhao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talhao  $talhao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $local_id, $id)
    {
        $request->validate([
            'nome'=> 'required|max:255'
        ]);

        $talhao = Talhao::find($id);
        $talhao->nome = $request->get('nome');
        $talhao->save();

        return redirect()->route('talhaos.index', $local_id)->with('success', 'Talhao atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talhao  $talhao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talhao = Talhao::find($id);
        $local = $talhao->local_id;
        $talhao->delete();

        return redirect()->route('talhaos.index', $local)->with('success', 'Talhao removido!');
    }
}
