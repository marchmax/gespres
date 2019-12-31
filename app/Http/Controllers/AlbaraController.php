<?php

namespace App\Http\Controllers;

use App\Albara;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AlbaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albara = Albara::has('items')->get();
        //$albara = Albara::find(283)->items()->where('quantitat','>','3')->get();
        return Response::json($albara);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('albarans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'numalbara' => 'required',
            'total' => 'required',
        ]);

        Albara::create($request->all());

        return redirect()->route('albarans.index')
                        ->with('success','Albarà creat successfully.');
        /*
        $albaraId = $request->albara_id;
        $albara   =   Albara::updateOrCreate(['id' => $albaraId],
        ['numalbara' => $request->numalbara, 'total' => $request->total, 'dataalbara' => $request->dataalbara,'client_id' => $request->client_id, 'estat' => $request->estat, 'any' => $request->any, 'iva' => $request->iva, 'observacions' => $request->observacions, 'subtotal' => $request->subtotal]);
        return Response::json($albara);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $albara = Albara::find($id);
        $items = Albara::find($id)->items;
        //return Response::json($items);

        return view('albarans.show',compact('albara','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $albara  = Albara::where($where)->first();
        return view('albarans.edit',compact('albara'));
        //return Response::json($albara);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $albara = Albara::where('id',$id)->delete();
        return Response::json($albara);
    }
}
