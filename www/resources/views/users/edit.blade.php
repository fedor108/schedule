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
      'action' => ["UserController@update", $data->id],
      'method' => 'PATCH',
    ]) }}
    <div class="box-header with-border">
      <h3 class="box-title">Изменить данные человека</h3>
    </div>
    <div class="box-body">
        <div class="box-body">

          <div class="form-group">
            <label>Имейл</label>
            <input type="text" class="form-control" name="email" value="{{ $data->email }}" placeholder="email">
          </div>

          <div class="form-group">
            <label>Имя</label>
            <input type="text" class="form-control" name="name"  value="{{ $data->name }}" placeholder="Имя">
          </div>

          <div class="form-group">
            <label>Телефон</label>
            <input type="text" class="form-control" name="phone"  value="{{ $data->phone }}" placeholder="Телефон">
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
