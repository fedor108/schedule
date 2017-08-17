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
      'action' => ["EventController@update", $data->id],
      'method' => 'PATCH',
    ]) }}
    <div class="box-header with-border">
      <h3 class="box-title">Изменить данные мероприятия</h3>
    </div>
    <div class="box-body">
        <div class="box-body">

          <div class="form-group">
            <label>Практика</label>
            <select class="form-control" name="practice_id">
              @foreach ($practices as $practice)
                <option value="{{ $practice->id }}" {{ ($practice->id == $data->practice_id ) ? 'selected' : ''}}>{{ $practice->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Обозначение</label>
            <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="name">
          </div>

          <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="title" value="{{ $data->title }}" placeholder="Название мероприятия">
          </div>

          <div class="form-group">
            <label>Адрес на сайте</label>
            <input type="text" class="form-control" name="slug" value="{{ $data->slug }}" placeholder="http://podnebesnaja.ru/286">
          </div>

          <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" name="price" value="{{ $data->price }}" placeholder="450 руб. - разовое / 4000 руб. - абонемент на 10 занятий">
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
