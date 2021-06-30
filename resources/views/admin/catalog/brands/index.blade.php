@extends('admin.layouts.layouts-horizontal-master')

@section('title') Markalar @endsection

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
        <div class="page-title-box">
            <h4 class="mt-0 header-title">Markalar
                <a href="/admin/catalog/brands/create" class="btn btn-primary float-right">Marka Ekle</a>
            </h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Marka</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $result)
                            <tr>
                                <td>{{$result->image}}</td>
                                <td>{{$result->name}}</td>
                                <td class="col-2">
                                    <a href="{{ url('/admin/catalog/brands/edit', ['id' => $result->id]) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                    <a href="{{ url('/admin/catalog/brands/remove', ['id' => $result->id]) }}" class="btn btn-danger btn-sm">Sil</a>
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
