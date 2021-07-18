@extends('admin.layouts.layouts-horizontal-master')

@section('title') Kargo İşlemleri @endsection

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
                    <h4 class="mt-0 header-title">Kargo İşlemleri
                    </h4>
                </div>
            </div>
        </div>
     </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Firma Adı</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($shipmentscompany as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td>{{$result->name}}</td>
                                    <td>
                                        <a href="{{ url('/admin/shipmentscompanies/edit', ['id' => $result->id]) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                        <a href="{{ url('/admin/shipmentscompanies/remove', ['id' => $result->id]) }}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
 @endsection
