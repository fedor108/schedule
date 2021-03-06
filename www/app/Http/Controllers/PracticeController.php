<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practice;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Practice::all();
        return view('practices.index',  compact('data'))
            ->with('page_title', 'Практики');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('practices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Practice;
        $data->fill($request->all());

        $data->save();

        return redirect()
            ->action('PracticeController@index')
            ->with('messages', ['Добавлена практика'])
            ->with('status', 'success');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Practice::findOrFail($id);

        return view('practices.edit', compact('data'))
            ->with('page_title', 'Практики');
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
        $data = Practice::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        return redirect()
            ->action('PracticeController@index')
            ->with('messages', ['Сохранена практика'])
            ->with('status', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Practice::findOrFail($id);
        $data->delete();

        return redirect()
            ->action('PracticeController@index')
            ->with('messages', ['Удалена практика'])
            ->with('status', 'success');
    }
}
