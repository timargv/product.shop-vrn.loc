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

          <div class="box">
              <div class="box-header"></div>
              <div class="box-body">
                  <ul>
                  @foreach($categories as $category)
                          <li><a href="{{route('categories.index')}}/{{$category->slug}}">{{ $category->title }}</a>
                          @if ($category->children)
                              <ul>
                                  @foreach ($category->children as $cats)
                                      <li><a href="{{route('categories.index')}}/{{$category->slug}}/{{ $cats->slug }}">{{ $cats->title }}</a>
                                          @if ($cats->children)
                                              <ul>
                                                  @foreach ($cats->children as $cat)
                                                      <li><a href="{{route('categories.index')}}/{{$category->slug}}/{{ $cats->slug }}/{{ $cat->slug }}">{{ $cat->title }}</a>
                                                          @if ($cat->children)
                                                              <ul>
                                                                  @foreach ($cat->children as $subcat)
                                                                      <li><a href="{{$cats->slug}}/{{ $subcat->slug }}">{{ $subcat->title }}</a></li>
                                                                  @endforeach
                                                              </ul>
                                                          @endif
                                                      </li>
                                                  @endforeach
                                              </ul>
                                          @endif
                                      </li>
                                  @endforeach
                              </ul>
                          @endif
                      </li>
                  @endforeach
                  </ul>
              </div>
          </div>

          <div class="box">
            <div class="box-header">
              Деревоadad
            </div>
            <div class="box-body">
              @foreach($categories as $category)
                <div class="col-md-12">
                    <h5>{{ $category->title }}</h5>
                    <hr />
                    <div class="row">
                        @foreach($category->children as $cats)
                        <div class="col-md-4">
                            <h6>{{ $cats->title }}</h6>
                            <hr />
                            @foreach($cats->children as $cat)
                            <div>{{$cat->title}}</div>
                                @foreach($cat->children as $subcat)
                                    <div>-- {{$subcat->title}}</div>
                                @endforeach
                            @endforeach
                        </div>
                        @endforeach
                      </div>
                    </div>
                @endforeach
            </div>
          </div>




      </section>
      <!-- /.content -->
  </div>
@endsection
