@extends('admin.layout')


@section('content')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Добавить категорию
              <small>приятные слова..</small>
          </h1>
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Добавляем категорию</h3>
                  @include('admin.errors')
              </div>
              {!! Form::open(['route' => 'categories.store']) !!}
              <div class="box-body">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Название</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title')}}">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Позиция а</label>
                          <input type="text" name="position" class="form-control" id="example1" placeholder="Позиция категории число" value="{{ old('position')}}">
                      </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <a href="{{ route('categories.index')}}" class="btn btn-default ml-3">Назад</a>
                  <button class="btn btn-success pull-right">Добавить</button>
              </div>
              <!-- /.box-footer-->
              {!! Form::close() !!}
          </div>
          <!-- /.box -->

      </section>
      <!-- /.content -->
  </div>
@endsection
