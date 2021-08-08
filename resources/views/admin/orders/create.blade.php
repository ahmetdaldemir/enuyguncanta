@extends('admin.layouts.layouts-horizontal-master')

@section('title') Sipariş Ekle @endsection

@section('content')
    <div ng-controller="mainController">
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
                <form method="post" action="/admin/orders/save" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">SİPARİŞ EKLE</h4>
                            <hr/>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Müşteri </label>
                                <div class="col-sm-10">

                                    <div class="input-group mb-3">
                                        <input data-customer_id="" type="search"
                                               class="form-control nav-search nav-search-field ng-pristine ng-valid ng-empty ng-touched"
                                               id="theSearch" autocomplete="off" ng-keyup="fetchUsers()"
                                               ng-model="searchText" ng-click="searchboxClicked($event);"
                                               name="searchkeyword" method="get">
                                        <input type="hidden" id="theSearchHidden" name="customer_id" />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary waves-effect waves-light"
                                                    type="button" data-toggle="modal" data-target=".customer"><i
                                                    class="fas fa-plus"></i></button>
                                        </div>
                                        <ul id="theSearchUl" style="    width: 100%;  position: relative;">
                                            <li ng-click="addCustomerInput(item.id,item.firstname,item.lastname)"
                                                ng-repeat="item in searchResult">@{{item.firstname}} @{{item.lastname}}
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Toplam Fiyat</label>
                                    <input type="text" class="form-control" name="custom_amount">
                                </div>
                                <div class="col-md-4">
                                    <label>Ödeme Tipi</label>
                                    <select class="form-control" name="payment_type">
                                        <option value="pay_of_door" selected>Kapıda Ödeme Nakit</option>
                                        <option value="pay_of_door">Kapıda Ödeme Pos</option>
                                        <option value="cash" >Banka Havalesi</option>
                                        <option value="credit_card">Kredi Kartı</option>
                                    </select>
                                 </div>
                                <div class="col-md-4">
                                    <label>Kargo</label>
                                    <select class="form-control" name="shipment_id">
                                        <?php foreach ($shipmentcompanies as $val){ ?>
                                        <option value="<?=$val->id?>"><?=$val->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Müşteri ile farklı olması halinde doldurunuz</legend>
                                    <div class="form-group row">
                                        <label for="example-text-customer" class="col-sm-2 col-form-label">Müşteri Adı  Soyadı</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name"  id="example-text-customer" placeholder="Telefon">
                                            <small style="color:#ff0000"><b>* Zorunlu DEĞİL </b></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-tel" class="col-sm-2 col-form-label">Telefon</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="tel" id="example-text-tel"  placeholder="Telefon">
                                            <small style="color:#ff0000"><b>* Zorunlu DEĞİL </b></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-mail" class="col-sm-2 col-form-label">E-posta</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="email" id="example-text-mail"  placeholder="E-posta" >
                                            <small style="color:#ff0000"><b>* Zorunlu DEĞİL </b></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">İl</label>

                                        <div class="col-sm-10" ng-init="cities()">
                                            <select ng-model="cityId" ng-change="cityChange()" name="city" class="form-control"  ng-change="cityChange()">
                                                <option disabled selected hidden>Şehirler</option>
                                                <option ng-repeat="item in cities" value="@{{item.id}}">@{{item.name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">İlçe</label>
                                        <div class="col-sm-10">
                                            <select name="state" id="state" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label for="example-text-mail" class="col-sm-2 col-form-label">E-posta</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="email" id="example-text-mail"  placeholder="E-posta" >
                                        <small style="color:#ff0000"><b>* Zorunlu DEĞİL </b></small>
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-mail" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control"   name="description" id="example-text-mail" ></textarea>
                                    <small style="color:#ff0000"><b>* Zorunlu DEĞİL </b></small>
                                </div>
                            </div>
                        </hr>
                            <div class="form-group row">
                                <label for="example-text-mail" class="col-sm-2 col-form-label">Ürünler</label>
                                <div class="col-sm-10">
                                    <div class="table-responsive">
                                        <table class="table mb-0" id="product-list">
                                            <thead>
                                            <tr>
                                                <th>Ürün Adı</th>
                                                <th>Adet</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <input ng-keyup="fetchProducts(1)" ng-model="searchProducts"
                                                           data-product_id="" class="form-control" type="text"
                                                           name="name" id="theProducts_1" placeholder="Ürün Adı"  autocomplete="off" />
                                                    <ul id="theProductsUl_1"
                                                        style="    width: 100%;  position: relative;">
                                                        <li ng-click="addProductsInput(item.id,item.name,item.stock_code,1)"
                                                            ng-repeat="item in productsResult">@{{item.name}}
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
{{--                                                    <button type="button" id="button-product"--}}
{{--                                                            class="btn btn-success waves-effect waves-light"> + Ürünü--}}
{{--                                                        Ekle--}}
{{--                                                    </button>--}}
                                                    <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal" data-target=".product"> +
                                                    </button>
                                                </td>
                                            </tr>
                                            </tfoot>
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
                    <form id="customerForm" method="post" ng-submit="addCustomer()">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Müşteri Ekle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-firstname" class="col-sm-2 col-form-label">Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="firstname" id="example-text-firstname"
                                           placeholder="Adı">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-lastname" class="col-sm-2 col-form-label">Soyadı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="lastname" id="example-text-lastname"
                                           placeholder="Soyadı">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-ltel" class="col-sm-2 col-form-label">Telefon</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="tel" id="example-text-ltel"
                                           placeholder="Telefon">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-email" class="col-sm-2 col-form-label">E-posta</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" id="example-text-email"
                                           placeholder="E-posta" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-address" class="col-sm-2 col-form-label">Adres</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="address" id="example-text-address"
                                           placeholder="Adres">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Şehir</label>

                                <div class="col-sm-10" ng-init="cities()">
                                    <select ng-model="cityId" ng-change="cityChange()" name="city" class="form-control" ng-change="cityChange()">
                                        <option disabled selected hidden>Şehirler</option>
                                        <option ng-repeat="item in cities" value="@{{item.id}}">@{{item.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Semt</label>
                                <div class="col-sm-10">
                                    <select name="state" id="state1" class="form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Müşteriyi Ekle
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!--  Modal content for the above example -->
        <div class="modal fade product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="productForm" method="post" ng-submit="addProduct()">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Ürün Ekle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-name" class="col-sm-2 col-form-label">Ürün Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" id="example-text-name"
                                           placeholder="Ürün Adı">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-stock_code" class="col-sm-2 col-form-label">Ürün Kodu</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="stock_code"
                                           id="example-text-stock_code" placeholder="Ürün Kodu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-barcode" class="col-sm-2 col-form-label">Barkod</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="barcode" id="example-text-barcode"
                                           placeholder="Barkod">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-price1" class="col-sm-2 col-form-label">Fiyat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="price1" id="example-text-price1"
                                           placeholder="Fiyat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-quantity" class="col-sm-2 col-form-label">Stok Miktarı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="quantity" id="example-text-quantity"
                                           placeholder="Stok Miktarı">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ürünü Ekle</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>


    <script>
        app.controller("mainController", function ($scope, $http, $httpParamSerializerJQLike, $window) {
            $scope.addCustomer = function () {
                $http({
                    method: 'POST',
                    url: '/api/v1/save_customer',
                    data: $("#customerForm").serialize(),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    Swal.fire({
                        title: response.data.message,
                        icon: response.data.type,
                    });
                    $(".customer").modal("hide");
                });
            }
            $scope.addProduct = function () {
                $http({
                    method: 'POST',
                    url: '/api/v1/save_product',
                    data: $("#productForm").serialize(),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    Swal.fire({
                        title: response.data.message,
                        icon: response.data.type,
                    });
                    $(".product").modal("hide");
                });
            }

            $scope.cities = function () {
                $http({
                    method: 'GET',
                    url: '/api/v1/cities',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    $scope.cities = response.data;
                });
            }

            $scope.cityChange = function () {
                $("#state").html('');
                $("#state1").html('');
                let cityId = $scope.cityId;
                $http({
                    method: 'GET',
                    url: '/api/v1/get_state/' + cityId + '',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    $.each(response.data, function (index, value) {
                        $('#state,#state1').append($('<option>', {
                            value: value.id,
                            text: value.name
                        }));
                    });


                });
            }
            MainCtrl.$inject = ['$http'];

            function MainCtrl($http) {
                var that = this;
                that.airportName = null;

                that.autoCompleteOptions = {
                    minimumChars: 1,
                    dropdownWidth: '500px',
                    dropdownHeight: '200px',
                    pagingEnabled: true,
                    pageSize: 5,
                    data: function (searchText, pagingParams) {
                        return $http.get('airports.json')
                            .then(function (response) {
                                // ideally filtering/paging should be done on server
                                searchText = searchText.toUpperCase();

                                var airports = _.filter(response.data, function (airport) {
                                    return airport.name.startsWith(searchText);
                                });
                                airports = getPage(airports, pagingParams.pageIndex, pagingParams.pageSize);

                                return _.pluck(airports, 'name');
                            });
                    }
                }
            }

            $scope.fetchUsers = function () {
                $("#theSearchUl").show();
                var searchText_len = $scope.searchText.trim().length;
                // Check search text length
                if (searchText_len > 0) {
                    $scope.data = [];
                    $http({
                        method: "POST", // method bu sefer post
                        url: "/api/v1/get_customer", // urlmiz
                        data: $httpParamSerializerJQLike({ // serialize etmek iÃ§in kullandÄ±ÄŸÄ±mÄ±z method
                            searchText: $scope.searchText,
                        }),
                        headers: { // gÃ¶nderme tipimiz burasÄ± Ã§ok Ã¶nemli
                            "Content-Type": "application/x-www-form-urlencoded"
                        }
                    }).then(function (response) {
                        console.log(response);
                        $scope.searchResult = response.data;
                    });
                } else {
                    $scope.searchResult = {};
                }
            }

            $scope.addCustomerInput = function (id, firstname, lastname) {
                $("#theSearch").attr("data-customer_id", id);
                $("#theSearch").val(firstname + " " + lastname);
                $("#theSearchHidden").val(id);
                $("#theSearchUl").hide();
            }

            $scope.addProductsInput = function (id, name, stock_code, index) {
                $("#theProducts_" + index).attr("data-product_id", id);
                $("#theProducts_" + index).val(name);
                $("#theProductsStockCode_" + index).val(stock_code);
                $("#theProductsUl_" + index).hide();

                html = '<tr id="product-value-row' + id + '"><input  type="hidden" name="product['+id+'][id]"   value="' + id + '"  >';
                html += '<td colspan="2"><input class="form-control"  type="text" name="product['+id+'][name]" id="theProducts_' + id + '" value="' + name + '" readonly></td>';
                html += '<td><input class="form-control" type="text" name="product['+id+'][quantity]" id="theProductsQuantity_' + id + '" placeholder="Adet" autocomplete="off"></td>';
                html += '<td><button onclick="$(\'#product-value-row' + id + '\').remove();" type="button" class="btn btn-danger waves-effect waves-light"> - Sil</button></td>';
                html += '</tr>';
                $('#product-list tbody').append(html);

            }

            $scope.fetchProducts = function (id) {
                $("#theProductsUl_" + id).show();

                var searchText_len = $scope.searchProducts.trim().length;
                // Check search text length
                if (searchText_len > 0) {
                    $scope.data = [];
                    $http({
                        method: "POST", // method bu sefer post
                        url: "/api/v1/get_products", // urlmiz
                        data: $httpParamSerializerJQLike({ // serialize etmek iÃ§in kullandÄ±ÄŸÄ±mÄ±z method
                            searchProducts: $scope.searchProducts,
                        }),
                        headers: { // gÃ¶nderme tipimiz burasÄ± Ã§ok Ã¶nemli
                            "Content-Type": "application/x-www-form-urlencoded"
                        }
                    }).then(function (response) {
                        $scope.productsResult = response.data;
                    });
                } else {
                    $scope.productsResult = {};
                }
            }

        });
    </script>
{{--    <script>--}}
{{--        var product_row = 0;--}}
{{--        $(document).on('click', '#button-product', function () {--}}
{{--            html = '<tr id="product-value-row' + product_row + '">';--}}
{{--            html += '<td colspan="2"><input class="form-control" autocomplete="off" ng-keyup="fetchProducts(product_row)"  ng-model="searchProducts" type="text" name="name" data-product_id="" id="theProducts_' + product_row + '" placeholder="Ürün Adı" autocomplete="off"></td>';--}}
{{--            html += '<td><input class="form-control" type="text" name="code" id="theProductsStockCode_' + product_row + '" placeholder="Ürün Kodu" autocomplete="off"></td>';--}}
{{--            html += '<td><input class="form-control" type="text" name="quentity" id="theProductsQuantity_' + product_row + '" placeholder="Adet" autocomplete="off"></td>';--}}
{{--            html += '<td></td>';--}}
{{--            html += '<td><button onclick="$(\'#product-value-row' + product_row + '\').remove();" type="button" class="btn btn-danger waves-effect waves-light"> - Sil</button></td>';--}}
{{--            html += '</tr>';--}}
{{--            $('#product-list tbody').append(html);--}}
{{--            product_row++;--}}

{{--            $("#theProductsUl_1").clone().insertAfter("#product-value-row" + product_row + " #theProducts_" + product_row);--}}
{{--        });--}}
{{--    </script>--}}
@endsection
