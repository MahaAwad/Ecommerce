@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">



            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">All Product </h5>
                        </div>
                        <div class="font-16 ms-auto">
                            <a href="{{ route('add.product') }}"><i title="add" class="fa fa-plus-square-o"
                                    style="font-size:22px;color:green;"> add</i> </a>



                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Product Image </th>
                                    <th>Product Name </th>
                                    <th>Product Code </th>
                                    <th>Product Category </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src=" {{ $item->image }} " alt="">
                                                </div>

                                            </div>
                                        </td>


                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->category }}</td>



                                        <td><a href="{{ route('product.edit', $item->id) }}"><i title="edit"
                                                    class="fa fa-edit"
                                                    style="font-size:22px;color:rgb(47, 26, 165);"></i> </a>
                                            <a href="{{ route('product.delete', $item->id) }}" id="delete"> <i
                                                    title="remove" class="fa fa-trash"
                                                    style="font-size:22px;color:rgb(241, 8, 39);"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
