@php
  $nav = [
    ['title' => 'Мероприятия', 'url' => action('EventController@index')],
    ['title' => 'Практики', 'url' => action('PracticeController@index')],
    ['title' => 'Люди', 'url' => action('UserController@index')],
  ];
@endphp
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  <ul class="nav navbar-nav">
    @foreach ($nav as $item)
      <li class="{{ ($item['url'] == Request::url()) ? 'active' : '' }}">
        <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
      </li>
    @endforeach
  </ul>

</div>
<!-- /.navbar-collapse -->

{{--  dropdown example
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
--}}
