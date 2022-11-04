@extends('admin.layout.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text"
                                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                               id="name" placeholder="Name"
                                               name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea id="short_description"
                                                  class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}"
                                                  name="short_description"
                                                  placeholder="Short Description">{{ old('short_description') }}</textarea>
                                        @if($errors->has('short_description'))
                                            <div class="text-danger">{{ $errors->first('short_description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="long_description">Long Description</label>
                                        <textarea id="long_description"
                                                  class="form-control {{ $errors->has('long_description') ? 'is-invalid' : '' }}"
                                                  name="long_description"
                                                  placeholder="Long Description">{{ old('long_description') }}</textarea>
                                        @if($errors->has('long_description'))
                                            <div class="text-danger">{{ $errors->first('long_description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number"
                                               class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                               id="price" placeholder="99"
                                               name="price" value="{{ old('price') }}">
                                        @if($errors->has('price'))
                                            <div class="text-danger">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="price_new">Price New</label>
                                        <input type="number"
                                               class="form-control {{ $errors->has('price_new') ? 'is-invalid' : '' }}"
                                               id="price_new" placeholder="11"
                                               name="price_new" value="{{ old('price_new') }}">
                                        @if($errors->has('price_new'))
                                            <div class="text-danger">{{ $errors->first('price_new') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">Quantity</label>
                                        <input type="number"
                                               class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}"
                                               id="qty" placeholder="1"
                                               name="qty" value="{{ old('qty') }}">
                                        @if($errors->has('qty'))
                                            <div class="text-danger">{{ $errors->first('qty') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="number"
                                               class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}"
                                               id="weight" placeholder="1"
                                               name="weight" value="{{ old('weight') }}">
                                        @if($errors->has('weight'))
                                            <div class="text-danger">{{ $errors->first('weight') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file"
                                               class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                               id="image"
                                               name="image">
                                        @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input name="active" class="custom-control-input" {{ old('active') ? 'checked' : '' }} type="checkbox" id="active" value="1">
                                            <label for="active" class="custom-control-label">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
