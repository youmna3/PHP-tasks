@extends('layouts.mainAdmin')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-success" href="#">Add</a>
                        <table class="table table-bordered table-striped text-center ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>DELETE</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($categories as $category)
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['name'] }}</td>
                                        <td><img src="{{ url($category['image']) }}"width="100px" /></td>
                                        <td scope="col"><button class="btn btn-danger">DELETE</button></td>
                                        <td scope="col"><button class="btn btn-success">EDIT</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
