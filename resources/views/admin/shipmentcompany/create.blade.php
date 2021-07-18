@extends('admin.layouts.layouts-horizontal-master')

@section('title') Siparişler @endsection
@section('headerCss')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

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
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($shipmentscompany as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td><i class="far fa-user" title="{{$result->user->name}}"></i></td>
                                    <td>
                                        <a href="{{ url('/admin/orders/view', ['id' => $result->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="far fa-eye"></i> </a>
                                        <a href="{{ url('/admin/orders/edit', ['id' => $result->id]) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                        <a href="{{ url('/admin/orders/remove', ['id' => $result->id]) }}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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
    <!-- end row -->
@endsection
@section('footerScript')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
