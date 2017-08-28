@extends('layouts/app')

@section('content')

{{-- <div class="callout callout-info">
  <h4>Tip!</h4>

  <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
    sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
    links instead.</p>
</div>
<div class="callout callout-danger">
  <h4>Warning!</h4>

  <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
    and the content will slightly differ than that of the normal layout.</p>
</div> --}}

<div class="box box-default">
  {{ Form::open([
      'action' => ["ScheduleController@update", $data->id],
      'method' => 'PATCH',
    ]) }}
    <div class="box-header with-border">
      <h3 class="box-title">Изменить данные мероприятия</h3>
    </div>
    <div class="box-body">
        <div class="box-body">

          <div class="form-group">
            <label>Мероприятие</label>
            <select class="form-control" name="event_id">
              @foreach ($events as $event)
                <option value="{{ $event->id }}" {{ ($event->id == $data->event_id ) ? 'selected' : ''}}>{{ $event->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Дата и время начала</label>
            <input type="text" class="form-control" name="date_from" value="{{ $data->date_from }}" placeholder="Tuesday 18:30">
          </div>

          <div class="form-group">
            <label>Дата и время завершения</label>
            <input type="text" class="form-control" name="date_to" value="{{ $data->date_to }}" placeholder="Tuesday 21:30">
          </div>

          <div class="form-group">
            <label>Инструктор</label>
            <select class="form-control" name="user_id">
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>

        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
  {{ Form::close() }}
</div>
<!-- /.box -->


@endsection
