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
            <form method="post" action="/admin/products/save" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ürün Ekle</h4>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option disabled selected hidden>Seç</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Marka</label>
                            <div class="col-sm-10">
                                <select name="brand_id" class="form-control">
                                    <option disabled selected hidden>Seç</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" id="example-text-input" placeholder="Ürün Adı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Stok Kodu</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="stock_code" id="example-text-input" placeholder="Stok Kodu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Barkod</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="barcode" id="example-text-input" placeholder="Barkod">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Fiyat</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="price1" id="example-text-input" placeholder="Fiyat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Stok Miktarı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="quantity" id="example-text-input" placeholder="Stok Miktarı">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary float-right">Kaydet</button>
                        </div>
                    </div>
            </form>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
