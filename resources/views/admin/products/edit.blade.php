@extends('admin.layouts.layouts-horizontal-master')

@section('title') Müşteriler @endsection

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
            <form method="post" action="/admin/products/update" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ürün Düzenle</h4>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option disabled selected hidden>Seç</option>
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}" <?=$product->category_id == $cat->id ? 'selected':null?>>{{$cat->name}}</option>
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
                                        <option value="{{$brand->id}}" <?=$product->brand_id == $brand->id ? 'selected':null?>>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" value="{{$product->name}}" id="example-text-input" placeholder="Ürün Adı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Stok Kodu</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="stock_code" value="{{$product->stock_code}}" id="example-text-input" placeholder="Stok Kodu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Barkod</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="barcode" value="{{$product->barcode}}" id="example-text-input" placeholder="Barkod">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Fiyat</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="price1" value="{{$product->price1}}" id="example-text-input" placeholder="Fiyat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Stok Miktarı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="quantity" value="{{$product->quantity}}" id="example-text-input" placeholder="Stok Miktarı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Resim</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="example-text-input">
                                <input class="form-control" type="hidden" name="old_data" value="{{$product->image}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right">Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
