@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=>	['products.update', $product->id],
            'files'	=>	true,
            'method'	=>	'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{-- $product->getImage() --}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>

                        <div class="form-group">
                            <label>Теги</label>
                            {{Form::select('categories[]',
                                $categories,
                                $selectedCategories,
                                ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите категории'])
                            }}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->price}}" name="ptice">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена поставщика</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->price_old}}" name="price_dealer">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Артикул</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->num}}" name="num">
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="shdesc" id="" cols="30" rows="10" class="form-control" >{{$product->shdesc}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{$product->desc}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
