<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Event;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Schedule::all();
        $events = Event::all();

        return view('schedules.index',  compact('data', 'events'))
            ->with('page_title', 'Расписание');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Schedule;
        $data->fill($request->all());

        $data->save();

        return redirect()
            ->action('ScheduleController@index')
            ->with('messages', ['Добавлено расписание'])
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
        $data = Schedule::findOrFail($id);
        $events = Event::all();

        return view('schedules.edit', compact('data', 'events'))
            ->with('page_title', 'Расписание');
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
        $data = Schedule::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        return redirect()
            ->action('ScheduleController@index')
            ->with('messages', ['Сохранено расписание'])
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
        $data = Schedule::findOrFail($id);
        $data->delete();

        return redirect()
            ->action('ScheduleController@index')
            ->with('messages', ['Удалено расписание'])
            ->with('status', 'success');
    }
}
