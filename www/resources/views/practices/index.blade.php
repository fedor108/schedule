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

@if($data->count() > 0)
  <div class="box box-default">
    <div class="box-body">
      <table class="table">
        @foreach($data as $item)
          <tr>
            <td><a href="{{ action('PracticeController@edit', $item->id) }}">{{ $item->title }}</a></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->slug }}</td>
            <td>
              {{ Form::open(['route' => ['practices.destroy', $item], 'method' => 'DELETE'], ['role' => 'form']) }}
                <button type="submit" class="btn btn-xs btn-danger">Удалить</button>
              {{ Form::close() }}
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endif

<div class="box box-default">
  {{ Form::open(['action'=>'PracticeController@store'])}}
    <div class="box-header with-border">
      <h3 class="box-title">Добавить  практику</h3>
    </div>
    <div class="box-body">
        <div class="box-body">

          <div class="form-group">
            <label>Обозначение</label>
            <input type="text" class="form-control" name="name" placeholder="name">
          </div>

          <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="title" placeholder="Название практики">
          </div>

          <div class="form-group">
            <label>Адрес на сайте</label>
            <input type="text" class="form-control" name="slug" placeholder="http://podnebesnaja.ru/category/qigong">
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
