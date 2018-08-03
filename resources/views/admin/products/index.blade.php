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
              <h3 class="box-title">Товаров - {{ $productCount  }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('products.create') }}" class="btn btn-success">Добавить</a>
                <a href="{{ route('products.export') }}" class="btn btn-default">Export</a>
                  <form method="post" action="{{ route('products.import') }}" enctype="multipart/form-data" class="form-inline pull-right">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <input type="file" name="file" id="exampleInputFile">
                      </div>
                      <button type="submit" class="btn btn-success">Импорт</button>
                  </form>
              </div>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="50px">ID</th>
                  <th width="50px">Картинка</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Артикул</th>
                  <th>Цена</th>
                  <th width="120px">Действия</th>
                </tr>
                </thead>
                <tbody>


                  <tr>

                    <td colspan="2" class="text-right"></td>

                      <form class="" action="?" method="GET">
                        <td>
                              <input id="title" class="form-control" name="title" value="{{ request('title') }}" placeholder="Поиск товара...">
                        </td>
                        <td></td>

                        <td>
                              <input id="num" class="form-control" name="num" value="{{ request('num') }}" placeholder="Артикул товара">
                        </td>
                        <td>
                              <a href="{{route('products.index')}}" class="btn btn-danger"><i class="fa fa-refresh"></i></a>
                        </td>
                        <td>
                              <button type="submit" class="btn btn-primary">Search</button>
                        </td>

                      </form>
                  </tr>



                @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <img src="{{ $product->getImage() }}" alt="" width="100%">
                    </td>
                    <td>{{ $product->title }}</td>
                      <td>{{ $product->getCategoriesTitle() }}</td>
                      <td>{{ $product->num }}</td>
                      <td>{{ $product->price }}</td>

                    <td>
                      <div class="btn-group">

                          {!! Form::open(['route'=>['products.destroy', $product->id], 'method'=>'delete',  'class' => 'form-inline']) !!}
                          <a href="{{route('products.edit', $product->id)}}" class="btn btn-link btn-xs"><i class="fa fa-pencil"></i></a>

                          <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-link btn-xs">
                              <i class="fa fa-remove"></i>
                          </button>

                          {!! Form::close() !!}

                      </div>
                  </tr>
                 @endforeach

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
