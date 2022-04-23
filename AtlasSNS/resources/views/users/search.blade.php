@extends('layouts.login')

@section('content')
<div class="search-form">
{!! Form::open(['url' =>'/search']) !!}
　{!! Form::input('text' , 'name' , null,['class' => 'form-control','placeholder' => 'username']) !!}
<button type="submit" class="btn-search">search</button>
{!! Form::close() !!}
<div class="session">
    検索ワード：{{ session('search') }}
  </div>
</div>

<div class="users-index">

</div>


@endsection
