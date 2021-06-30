@extends('admin.layouts.layouts-horizontal-master')

@section('title') Siparişler @endsection

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
                <h4 class="mt-0 header-title">Siparişler {{$user_id}}
                    <a href="/admin/orders/create" class="btn btn-primary float-right">Sipariş Ekle</a>
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
                                <th>
                                    <a href="{{ url('/admin/customers/edit') }}" class="btn btn-primary btn-sm">Arama Yap</a>
                                </th>
                            </tr>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Sipariş Durumu</th>
                                <th>Tutar</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $result)
                                <tr>
                                    <td>{{$result->firstname. ' '.$result->lastname}}</td>
                                    <td>{{$result->tel}}</td>
                                    <td>{{$result->email}}</td>
                                    <td>{{$result->email}}</td>
                                    <td>
                                        <a href="{{ url('/admin/orders/view', ['id' => $result->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="far fa-eye"></i> Görüntüle</a>
                                        <a href="{{ url('/admin/orders/edit', ['id' => $result->id]) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                        <a href="{{ url('/admin/orders/remove', ['id' => $result->id]) }}" class="btn btn-danger btn-sm">Sil</a>
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
