@extends('admin.layout.index')

@section('content')
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product</h3>
                                <div class="text-right">
                                    <a class="btn btn-success btn-sm" href="{{ route('product.create') }}">
                                        <i class="fas fa-plus"></i> Add
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table-product" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Short Description</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Weight</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Active</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->short_description }}</td>
                                            <td>{{ number_format($data->price, 2) }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>{{ $data->weight }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('images').'/'.$data->image }}"
                                                     width="100" height="100" alt="{{ $data->name }}">
                                            </td>
                                            <td>{{ $data->active }}</td>
                                            <td>{{ $data->created_at->format('d-m-Y H:i:s') }}</td>
                                            <form method="post"
                                                  action="{{ route('product.destroy', $data->id) }}">
                                                @csrf
                                                @method('delete')
                                                <td class="project-actions text-right text-center">
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ route('product.edit', $data->id) }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"
                                                           href="{{ route('product.destroy', $data->id) }}">
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('my-custom-script')
    <script>
        $(document).ready(function () {
            $("#table-product").DataTable({
                "responsive": true,
                "autoWidth": false,
                "pageLength": 10
            });
        });
    </script>
@endsection

