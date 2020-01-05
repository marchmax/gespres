<?php

namespace App\Http\Controllers;

use App\Albara;
use App\Client;
use App\AlbaraItems;
use PDF;
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
        //$albara = Albara::has('items')->get();
        //$albara = Albara::find(283)->items()->where('quantitat','>','3')->get();
        //return Response::json($albara);
        //return view('albarans.index', compact('albara'));

        $albara = Albara::has('items')->paginate(5);

        return view('albarans.index',compact('albara'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::pluck('nom', 'id');
        return view('albarans.create',compact('clients'));
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

        $albara = Albara::create($request->except('_token'));

        if ($albara->save()){
            $id = $albara->id;
            foreach($request->producte as $key =>$producte){
                $data = array(
                            'albara_id'=>$id,
                            'producte'=>$request->producte [$key],
                            'quantitat'=>$request->quantitat [$key],
                            'preu'=>$request->preu [$key],
                            'total'=>$request->totals [$key],
                );
            AlbaraItems::insert($data);
            }
        }

        return redirect()->route('albarans.index')
                ->with('success','Albarà creat successfully.');

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
        return view('albarans.show',compact('albara'));
    }

    public function pdf($id)
    {
        //
        $albara = Albara::find($id);
        $pdf = PDF::loadView('albarans.pdf', compact('albara'));

        return $pdf->download('disney.pdf');
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
        $albara = Albara::findOrFail($id);
        $albara->dataalbara = $request->get('dataalbara');
        $albara->estat = $request->get('estat');
        $albara->any = $request->get('any');
        $albara->total = $request->get('total');
        $albara->observacions = $request->get('observacions');

        if ($albara->save()){
            $id = $albara->id;

            $ar = array_filter($request->item_id);
            foreach ($albara->items as $key=>$value){
                if(!in_array($value->id, $ar)){
                    AlbaraItems::where('id',$value->id)->delete();
                }

            }

            foreach($request->producte as $key =>$producte){
                $item = AlbaraItems::findOrNew($request->item_id [$key]);
                $item->albara_id = $id;
                $item->producte = $request->producte [$key];
                $item->quantitat = $request->quantitat [$key];
                $item->preu = $request->preu [$key];
                $item->total = $request->totals [$key];
                $item->save();
            }
        }

        return redirect()->route('albarans.index')
                ->with('success','Albarà actualitzat.');


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
        return redirect()->route('albarans.index')
                ->with('success','Albarà eliminat.');
    }


}
