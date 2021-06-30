@extends('admin.layouts.layouts-horizontal-master')

@section('title') Sipariş Durumu Ekle @endsection

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
        <form method="post" action="/admin/catalog/orderstatus/save" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Sipariş Durumu</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" id="example-text-input" placeholder="Sipariş Durumu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Durum Rengi</label>
                        <div class="col-sm-10">
                            <span class="sp-original-input-container" style="margin: 0px; display: flex;"><div class="sp-colorize-container sp-add-on" style="width: 33px; border-radius: 4px; border: 1px solid rgb(206, 212, 218);"><div class="sp-colorize" style="background-color: rgb(245, 178, 37); color: black;"></div> </div><input type="text" class="form-control spectrum with-add-on" id="colorpicker-showintial" value="#f5b225"></span>                        </div>
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
