@extends('admin.layouts.layouts-horizontal-master')

@section('title') Sipariş Ekle @endsection

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
            <form method="post" action="/admin/customers/save" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sipariş Ekle</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Müşteri </label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" name="customer" class="form-control" placeholder="Müşteri" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary waves-effect waves-light" type="button" data-toggle="modal" data-target=".customer"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                @foreach($customers as $result)
                                    {{$result->firstname}} &nbsp;
                                    {{$result->lastname}}
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-customer" class="col-sm-2 col-form-label">Müşteri Adı Soyadı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="tel" id="example-text-customer" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-tel" class="col-sm-2 col-form-label">Telefon</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="tel" id="example-text-tel" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-mail" class="col-sm-2 col-form-label">E-posta</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" id="example-text-mail" placeholder="E-posta" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-mail" class="col-sm-2 col-form-label">Ürünler</label>
                            <div class="col-sm-10">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <caption>Sipariş Ürünleri Listesi</caption>
                                        <thead>
                                        <tr>
                                            <th>Resim</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Adet</th>
                                            <th>Ücret</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Askılı Çanta</td>
                                            <td>12321</td>
                                            <td>1 Adet</td>
                                            <td>255,00</td>
                                            <td><button type="button" class="btn btn-danger waves-effect waves-light"> - Sil</button></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><input class="form-control" type="text" name="tel" id="example-text-customer" placeholder="Ürün Adı - Kodu" autocomplete="off"></td>
                                            <td><button type="button" class="btn btn-success waves-effect waves-light"> + Ürünü Ekle</button></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary float-right">Siparişi Kaydet</button>
                        </div>
                    </div>
            </form>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!--  Modal content for the above example -->
    <div class="modal fade customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" ng-submit="addCustomer()" action="javascript();">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Müşteri Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Adı</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="Adı">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Soyadı</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="lastname" id="example-text-input" placeholder="Soyadı">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="tel" id="example-text-input" placeholder="Telefon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">E-posta</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="email" id="example-text-input" placeholder="E-posta" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="address" id="example-text-input" placeholder="Adres">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Kapat</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Müşteriyi Ekle</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
<script>
    app.controller("mainController", function ($scope, $http, $httpParamSerializerJQLike, $window) {

        $scope.addCustomer = function () {
            $http({
                method: 'GET',
                url: './save_customer',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function successCallback(response) {

                console.log(response);
                $scope.customer = response.data;
            });
        }
    });
</script>
