<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::all();
        return view('pages/admin/portfolio', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = About::find($id);
        return view('pages/admin/editable/portfolios-show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = About::find($id);
        return view('pages/admin/editable/portfolios-edit', compact('user'));
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
        $validated = $request->validate([
            'works' => 'required',
        ]);
        $counter = 0;
        foreach ($request->works as $work) {
            if($work){
                $counter++;
                $file = 'images/works/'.$id.$counter.now()->timestamp.'.png';
                $path = $work->storeAs('public', $file);
                Portfolio::create([
                    'uid' => $id,
                    'portfolio_image' => $file,
                ]);
            }
        }
        return redirect(route('portfolios.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $userid)
    {
        if (!empty($request->images))
            foreach ($request->images as $id) {
                $work = Portfolio::find($id);
                $work->delete();
                Storage::delete('public/'.$work->portfolio_image);
            }
        return redirect(route('portfolios.edit', $userid));
    }
}
