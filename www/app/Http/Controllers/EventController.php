<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Practice;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::all();
        $practices = Practice::all();

        return view('events.index',  compact('data', 'practices'))
            ->with('page_title', 'Мероприятия');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Event;
        $data->fill($request->all());

        $data->save();

        return redirect()
            ->action('EventController@index')
            ->with('messages', ['Добавлено мероприятие'])
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
        $data = Event::findOrFail($id);
        $practices = Practice::all();

        return view('events.edit', compact('data', 'practices'))
            ->with('page_title', 'Мероприятия');
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
        $data = Event::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        return redirect()
            ->action('EventController@index')
            ->with('messages', ['Сохранено мероприятие'])
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
        $data = Event::findOrFail($id);
        $data->delete();

        return redirect()
            ->action('EventController@index')
            ->with('messages', ['Удалена мероприятие'])
            ->with('status', 'success');
    }
}
