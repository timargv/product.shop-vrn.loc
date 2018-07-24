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
          <div class="box box-info">
              <div class="box-header with-border">
                  <h3 class="box-title">Collapsible Accordion</h3>
              </div>



              <!-- /.box-header -->
              <div class="box-body">
                  <div class="row">
                      <div class="col-xs-5">
                          <a href="{{route('categories.create')}}" class="btn btn-success">Добавить</a>

                      </div>


                          {!! Form::open(['route' => 'categories.store', 'class' => 'col-xs-7 clearfix']) !!}



                          <div class="col-xs-5">
                              <input type="text" name="title" class="form-control " id="exampleInputEmail1" placeholder="Категория" value="">
                          </div>

                          <div class="col-xs-5">
                              {{Form::select('parent_id',
                                  $catlist,
                                  null,
                                  ['class' => 'form-control select2 ', 'placeholder' => 'Родительская категория'])
                              }}
                          </div>

                          <div class="col-xs-2">
                              <button class="btn btn-success pull-right">Добавить</button>
                          </div>

                          {!! Form::close() !!}

                  </div>
                  <div class="clearfix">
                      <div class="pull-left clearfix">

                      </div>
                      <div class="pull-right">

                      </div>

                  </div>
                  <br />

                  <div class="div-table">
                      <div class="th-header">
                          <div class="th-row">
                              <div class="th-d tb-input" style=" height: 32px;">
                                  <label style="margin-bottom: 0;">
                                      <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false"><input type="checkbox" class="minimal"><ins class="iCheck-helper"></ins></div>
                                  </label>

                              </div>
                              <div class="th-d tb-id">ID</div>
                              <div class="th-d tb-title">Название</div>
                              <div class="th-d tb-product-count">К-во товаров</div>
                              <div class="th-d tb-status">Активный</div>
                              <div class="th-d tb-status-menu">Меню</div>
                              <div class="th-d tb-status-edit-del">Действия</div>
                          </div>
                      </div>
                      <div class="tb-body">
                          @foreach($categories as $category)
                              <div class="tr-row">
                                  <div class="td-d tb-input">
                                      <label style="margin-bottom: 0">
                                          <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false"><input type="checkbox" class="minimal"><ins class="iCheck-helper"></ins></div>
                                      </label>
                                  </div>
                                  <div class="td-d tb-id">{{$category->id}}</div>
                                  <div class="td-d tb-title">
                                      @if (count($category->children) != null)
                                          <i class="fa fa-minus collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$category->id}}"></i>
                                      @endif
                                      {{$category->title}} - {{$category->slug}}
                                  </div>
                                  <div class="td-d tb-product-count">-</div>
                                  <div class="td-d tb-status">1</div>
                                  <div class="td-d tb-status-menu">1</div>
                                  <div class="td-d tb-status-edit-del">
                                      <div class="btn-group">
                                          <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                                          {{Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete',  'class' => 'btn btn-danger btn-xs'])}}
                                          <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-link btn-xs">
                                              <i class="fa fa-remove"></i>
                                          </button>

                                          {{Form::close()}}
                                      </div>
                                  </div>

                              </div>
                              <div id="collapse_{{$category->id}}" class="panel-collapse collapse" style="background: rgba(247, 247, 247, 0.7);">
                                  @foreach($category->children as $cats)
                                      <div class="tr-row">
                                          <div class="td-d tb-input">
                                              <label style="margin-bottom: 0">
                                                  <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false"><input type="checkbox" class="minimal"><ins class="iCheck-helper"></ins></div>
                                              </label>
                                          </div>
                                          <div class="td-d tb-id">{{$cats->id}}</div>
                                          <div class="td-d tb-title" style="padding-left: @if (count($cats->children) != null) 25px @else 20px @endif">
                                              @if (count($cats->children) != null)
                                                  <i class="fa fa-minus collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$cats->id}}"></i>
                                              @endif
                                              {{$cats->title}}
                                          </div>
                                          <div class="td-d tb-product-count">-</div>
                                          <div class="td-d tb-status">1</div>
                                          <div class="td-d tb-status-menu">1</div>
                                          <div class="td-d tb-status-edit-del">
                                              <div class="btn-group">
                                                  <a href="{{route('categories.edit', $cats->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                                                  {{Form::open(['route'=>['categories.destroy', $cats->id], 'method'=>'delete',  'class' => 'btn btn-danger btn-xs'])}}
                                                  <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-link btn-xs">
                                                      <i class="fa fa-remove"></i>
                                                  </button>

                                                  {{Form::close()}}
                                              </div>
                                          </div>

                                      </div>
                                      <div id="collapse_{{$cats->id}}" class="panel-collapse collapse" style="background: rgba(236, 236, 236, 0.44);">
                                          @foreach($cats->children as $cat)
                                              <div class="tr-row">
                                                  <div class="td-d tb-input ">
                                                      <label style="margin-bottom: 0">
                                                          <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false"><input type="checkbox" class="minimal"><ins class="iCheck-helper"></ins></div>
                                                      </label>
                                                  </div>
                                                  <div class="td-d tb-id">{{$cat->id}}</div>
                                                  <div class="td-d tb-title" style="padding-left: @if (count($cat->children) != null) 50px @else 45px @endif">
                                                      @if (count($cat->children) != null)
                                                          <i class="fa fa-minus collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$cat->id}}"></i>
                                                      @endif
                                                      {{$cat->title}}
                                                  </div>
                                                  <div class="td-d tb-product-count">-</div>
                                                  <div class="td-d tb-status">1</div>
                                                  <div class="td-d tb-status-menu">1</div>
                                                  <div class="td-d tb-status-edit-del">
                                                      <div class="btn-group">
                                                          <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                                                          {{Form::open(['route'=>['categories.destroy', $cat->id], 'method'=>'delete',  'class' => 'btn btn-danger btn-xs'])}}
                                                          <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-link btn-xs">
                                                              <i class="fa fa-remove"></i>
                                                          </button>

                                                          {{Form::close()}}
                                                      </div>
                                                  </div>

                                              </div>
                                          @endforeach
                                      </div>
                                  @endforeach
                              </div>

                          @endforeach
                      </div>
                  </div>


              </div>

              <div class="box-footer">
              </div>


          </div>



      </section>
      <!-- /.content -->
  </div>
@endsection
