@extends('admin.layout')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
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
              <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('products.create') }}" class="btn btn-success">Добавить</a>
              </div>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Теги</th>
                  <th>Картинка</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{$product->getCategoriesTitle()}}</td>
                    <td>Laravel, PHP</td>
                    <td>
                        <img src="{{$product->getImage()}}" alt="" width="100">
                    </td>
                    <td>
                      <div class="btn-group">
                          <a href="{{route('products.edit', $product->id)}}" class="btn btn-link btn-xs"><i class="fa fa-pencil"></i></a>

                          {{Form::open(['route'=>['products.destroy', $product->id], 'method'=>'delete',  'class' => 'btn btn-link btn-xs'])}}
                          <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-link btn-xs">
                              <i class="fa fa-remove"></i>
                          </button>

                          {{Form::close()}}
                      </div>
                  </tr>
                 @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              {{ $products->links() }}
            </div>
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
