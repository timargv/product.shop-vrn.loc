@extends('admin.layout')


@section('content')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              {{$title}}
              <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Examples</a></li>
              <li class="active">Blank page</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Список {{$title}}</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="form-group">
                      <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить</a>
                      {!! Form::open(['route' => 'categories.store', 'class' => 'form-inline pull-right']) !!}

                        <div class="form-group">
                          <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Категория">

                        </div>
                        <div class="form-group" style="width: 180px;">
                          <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div>
                        <button class="btn btn-default"><i class="fa fa-plus-circle" aria-hidden="true"></i> Быстрое создание</button>
                        @include('admin.errors')
                      {!! Form::close() !!}

                  </div>


                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Категория</th>
                          <th>Родительская категория</th>
                          <th>Позиция</th>
                          <th>Действия</th>
                      </tr>
                      </thead>
                      <tbody>

                      @foreach($categories as $category)
                          <tr>
                              <td>{{ $category->id  }}</td>
                              <td>{{ $category->title }}</td>
                              <td>{{ $category->parent_id }}</td>
                              <td>{{ $category->position }}</td>
                              <td><a href="{{ route('categories.edit', $category->id)}}" class="fa fa-pencil"></a> <a href="#" class="fa fa-remove"></a></td>
                          </tr>
                      @endforeach
                      </tfoot>
                  </table>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </section>
      <!-- /.content -->
  </div>
@endsection
