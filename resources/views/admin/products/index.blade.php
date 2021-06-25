@extends('admin.layouts.layouts-horizontal-master')

@section('title') Ürünler @endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        @component('admin.common-components.breadcrumb')
            @slot('title') Dashboard  @endslot
            @slot('li1') Lexa  @endslot
            @slot('li2') Dashboard  @endslot
            @slot('li3') Index  @endslot
        @endcomponent

        @component('admin.common-components.chart')
            @slot('chart1_id') header-chart-1  @endslot
            @slot('chart1_title') Balance $ 2,317  @endslot
            @slot('chart2_id') header-chart-2  @endslot
            @slot('chart3_title') Item Sold 1230  @endslot
        @endcomponent
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Ürünler
                        <a href="/admin/products/create" class="btn btn-primary float-right">Ürün Ekle</a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Ürün</th>
                                <th>Stok No</th>
                                <th>Barcode</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $result)
                                <tr>
                                    <td>{{$result->image}}</td>
                                    <td>{{$result->name}}</td>
                                    <td>{{$result->stock_code}}</td>
                                    <td>{{$result->barcode}}</td>
                                    <td>{{$result->quantity}}</td>
                                    <td>{{$result->price1}}</td>
                                    <td class="col-2">
                                        <a href="{{ url('/admin/products/edit', ['id' => $result->id]) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                        <a href="{{ url('/admin/products/remove', ['id' => $result->id]) }}" class="btn btn-danger btn-sm">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
