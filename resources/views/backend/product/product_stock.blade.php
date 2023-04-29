@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">DANH SÁCH KHO SẢN PHẨM<span class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Hình ảnh </th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá </th>
                                        <th>Số lượng </th>
                                        <th>Giảm giá </th>
                                        <th>Trạng thái </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;">  </td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ number_format($item->selling_price) }} đ</td>
                                            <td>{{ $item->product_qty }} sp</td>
                                            <td>
                                                @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">Không giảm giá</span>
                                                @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = ($amount/$item->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-pill badge-success"> Kích hoạt </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> Không kích hoạt </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
