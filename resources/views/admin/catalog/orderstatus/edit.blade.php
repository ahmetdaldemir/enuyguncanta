@extends('admin.layouts.layouts-horizontal-master')

@section('title') Sipariş Durumu Düzenle @endsection

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
            <form method="post" action="/admin/catalog/orderstatus/update" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$orderstatus->id}}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sipariş Durumu Düzenle</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Sipariş Durumu</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" value="{{$orderstatus->title}}" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Marka Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="color" id="example-text-input" value="{{$orderstatus->color}}" placeholder="Renk">
                            </div>
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
