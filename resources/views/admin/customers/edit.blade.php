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
            <form method="post" action="/admin/customers/update" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$customer->id}}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Müşteri Düzenle</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="firstname" value="{{$customer->firstname}}" id="example-text-input" placeholder="Adı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Soyadı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="lastname" value="{{$customer->lastname}}" id="example-text-input" placeholder="Soyadı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="tel" value="{{$customer->tel}}" id="example-text-input" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">E-posta</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" value="{{$customer->email}}" id="example-text-input" placeholder="E-posta">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="address" value="{{$customer->address}}" id="example-text-input" placeholder="Adres">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Şehir</label>
                            <div class="col-sm-10">
                                <select name="city" class="form-control">
                                    <option disabled selected hidden>Şehirler</option>
                                    <option value="1">İstanbul</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Semt</label>
                            <div class="col-sm-10">
                                <select name="state" class="form-control">
                                    <option disabled selected hidden>Semtler</option>
                                    <option value="1">Sarıyer</option>
                                </select>
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
