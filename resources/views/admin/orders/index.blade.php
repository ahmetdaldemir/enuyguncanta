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
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="button-items float-right">
                    <a href="/admin/orders/index/1" class="btn btn-info">Hazırlananlar Siparişler</a>
                    <a href="/admin/orders/index/2" class="btn btn-warning">Onaylanan Siparişler</a>
                    <a href="/admin/orders/index/4" class="btn btn-danger">Kargoda Olan Siparişler</a>
                    <a href="/admin/orders/index/0" class="btn btn-primary">Tüm Siparişler</a>
                    <a href="/admin/orders/create" class="btn btn-primary">Sipariş Ekle</a>
                    <a href="#" class="btn btn-info">Tümünü Yazdır</a>
                    <a href="/admin/orders/export" class="btn btn-success">Excel Aktar</a>
                </div>
                <h4 class="mt-0 header-title">Siparişler</h4>
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
                                <th><i class="fa fa-user"></i></th>
                                <th><input type="text" name="search_name" class="form-control" placeholder="Adı Soyadı"></th>
                                <th><input type="text" name="search_tel" class="form-control" placeholder="Telefon"></th>
                                <th>
                                    <select class="form-control" name="search_status" id="">
                                        <option value="">-- Sipariş Durumu --</option>
                                        @foreach($orderstatus as $status)
                                        <option value="{{$status->id}}">{{$status->title}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <a href="{{ url('/admin/customers/edit') }}" class="btn btn-primary btn-sm">Arama Yap</a>
                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th><i class="far fa-user" title="Ekleyen"></i></th>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Sipariş Durumu</th>
                                <th>OK</th>
                                <th>Tutar</th>
                                <th><i class="fa fa-print"></i></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td><i class="far fa-user" title="{{$result->user->name}}"></i></td>
                                    <td>{{$result->customer->firstname. ' '.$result->customer->lastname}}</td>
                                    <td>{{$result->customer->tel}}</td>
                                    <td><a href="/admin/orders/orderstatus/{{$result->id}}"><h5><span class="badge badge-{{$result->status->color}}">{{$result->status->title}}</span> - <span><a href="http://kargotakip.kargozamani.com:90/hareket.asp?har_kod={{$result->shipment_code}}">{{$result->shipment_code}}</a></span></h5></a></td>
                                    <td>
                                        <?php if($result->status_id != 1){ ?>
                                        <a target="_blank" href="/admin/orders/barcode/{{$result->id}}"><i class="fa fa-barcode"></i> </a>
                                        <?php }else{ ?>
                                        <a href="/admin/shipment/create/{{$result->id}}/2"><i class="fa fa-ship"></i> </a>
                                        <?php } ?>
                                    </td>
                                    <td>{{$result->amount}}</td>
                                    <td>{{$result->printed}}</td>
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
