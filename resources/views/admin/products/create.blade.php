@extends('admin.layout')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем статью</h3>
                </div>
                {{ Form::open(['route' => 'products.store', 'files' => 'true'])}}
                <div class="box-body">
                    @include('admin.errors')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('categories[]',
                                 $categories,
                                 null,
                                 ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите категорию'])
                             }}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Артикул</label>
                            <input name="num" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('num')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Старая Цена</label>
                            <input name="price_dealer" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('price_dealer')}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена</label>
                            <input name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('price')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Количество</label>
                            <input name="quantity" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('quantity')}}">
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal">
                            </label>
                            <label>
                                Рекомендовать
                            </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal">
                            </label>
                            <label>
                                Черновик
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Краткий текст</label>
                            <textarea name="shdecs" id="" cols="10" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="decs" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
                {{ Form::close() }}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>


@endsection