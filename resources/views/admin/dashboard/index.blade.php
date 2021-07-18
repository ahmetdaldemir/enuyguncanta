@extends('admin.layouts.layouts-horizontal-master')

@section('title') Yönetim Paneli @endsection

@section('content')
     <!-- start page title -->
<div class="row">

{{--    @component('admin.common-components.dashboard-widget')--}}
{{--         @slot('icons') mdi mdi-cube-outline float-right  @endslot--}}
{{--         @slot('title') Orders  @endslot--}}
{{--         @slot('price') 1,587  @endslot--}}
{{--         @slot('badgeClass') badge-info @endslot--}}
{{--         @slot('per') +11%  @endslot--}}
{{--    @endcomponent--}}

{{--    @component('admin.common-components.dashboard-widget')--}}
{{--         @slot('icons') mdi mdi-buffer float-right  @endslot--}}
{{--         @slot('title') Revenue  @endslot--}}
{{--         @slot('price') $46,782  @endslot--}}
{{--         @slot('badgeClass') badge-danger @endslot--}}
{{--         @slot('per') -29%  @endslot--}}
{{--    @endcomponent--}}

{{--    @component('admin.common-components.dashboard-widget')--}}
{{--         @slot('icons') mdi mdi-tag-text-outline float-right  @endslot--}}
{{--         @slot('title') Average Price  @endslot--}}
{{--         @slot('price') $15.9  @endslot--}}
{{--         @slot('badgeClass') badge-warning @endslot--}}
{{--         @slot('per') 0%  @endslot--}}
{{--    @endcomponent--}}


{{--    @component('admin.common-components.dashboard-widget')--}}
{{--         @slot('icons') mdi mdi-briefcase-check float-right  @endslot--}}
{{--         @slot('title') Product Sold  @endslot--}}
{{--         @slot('price') 1890  @endslot--}}
{{--         @slot('badgeClass') badge-info @endslot--}}
{{--         @slot('per') +89%  @endslot--}}
{{--    @endcomponent--}}

</div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Son Siparişler</h4>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><i class="far fa-user" title="Ekleyen"></i></th>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Sipariş Durumu</th>
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
                                    <td><h5><span class="badge badge-{{$result->status->color}}">{{$result->status->title}}</span></h5></td>
                                    <td>{{$result->amount}}</td>
                                    <td>{{$result->printed}}</td>
                                    <td>
                                        <a href="{{ url('/admin/orders/view', ['id' => $result->id]) }}" target="_blank" class="btn btn-success btn-sm"><i class="far fa-eye"></i> </a>
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
<!--Morris Chart-->
<script src="{{ URL::asset('/public/libs/morris.js/morris.js.min.js')}}"></script>
<script src="{{ URL::asset('/public/libs/raphael/raphael.min.js')}}"></script>
<script src="{{ URL::asset('/public/js/pages/dashboard.init.js')}}"></script>
@endsection
