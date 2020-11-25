<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalController extends Controller
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
    public function index()
    {
        $user = Auth::user()->id;
        $locals = Local::where('user_id','=',$user)->get();

        return view('locals.index', compact('locals', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;

        $request->validate([
            'nome'=> 'required|max:255'
        ]);

        $local = new Local([
            'user_id' => $user,
            'nome' => $request->get('nome')
        ]);

        $local->save();

        return redirect('/locals')->with('success', 'Local inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Local::find($id);

        return view('locals.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $local = Local::find($id);

        return view('locals.edit', compact('local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'=> 'required|max:255'
        ]);

        $local = Local::find($id);
        $local->nome = $request->get('nome');
        $local->save();

        return redirect('/locals')->with('success', 'Local atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $local = Local::find($id);
        $local->delete();

        return redirect('/locals')->with('success', 'Local removido!');
    }
}
