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
                <h4 class="mt-0 header-title">Sipariş Detayı
                    <a href="/admin/orders/create" class="btn btn-primary float-right">Sipariş Ekle</a>
                </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h4 class="float-right font-size-16"><strong>Order # {{$order->id}}</strong></h4>
                                <h3 class="mt-0">
                                   <i class="fa fa-box"></i>
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                        <strong>Müşteri :</strong><br>
                                        <?php echo $order->customer->firstname ." ". $order->customer->lastname ?><br>
                                        <?=$order->customer->address?><br>
                                        <?=$order->customer->tel?><br>
                                        <?=$order->customer->mail?>
                                    </address>
                                </div>
                                <div class="col-6 text-right">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-4">
                                    <address>
                                        <strong>Ödeme Tipi :</strong><br>
                                        Visa ending **** 4242<br>
                                        <?=$order->customer->mail?>
                                    </address>
                                </div>
                                <div class="col-6 mt-4 text-right">
                                    <address>
                                        <strong>Sipariş Tarihi:</strong><br>
                                        <?=date("d-m-Y H:i:s",strtotime($order->created_at))?><br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="p-2">
                                    <h3 class="font-size-16"><strong>Ürünler</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><strong>Resim</strong></td>
                                                <td><strong>Stok Kodu</strong></td>
                                                <td><strong>Fiyat</strong></td>
                                                <td><strong>Adet</strong></td>
                                                <td class="text-right"><strong>Toplam</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($order->product as $line){ ?>
                                            <tr>
                                                <td><img style="width: 50px" src="/public/upload/<?=$line->product->image?>" /></td>
                                                <td><?=$line->product->stock_code?></td>
                                                <td><?=$line->product->name?></td>
                                                <td><?=$line->quantity?></td>
                                                <td class="text-right"><?=number_format($line->price, 2)?> <i class="fa fa-lira-sign"></i> </td>
                                            </tr>
                                         <?php } ?>
{{--                                            <tr>--}}
{{--                                                <td class="thick-line"></td>--}}
{{--                                                <td class="thick-line"></td>--}}
{{--                                                <td class="thick-line text-center">--}}
{{--                                                    <strong>Subtotal</strong></td>--}}
{{--                                                <td class="thick-line text-right">$670.99</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="no-line"></td>--}}
{{--                                                <td class="no-line"></td>--}}
{{--                                                <td class="no-line text-center">--}}
{{--                                                    <strong>Shipping</strong></td>--}}
{{--                                                <td class="no-line text-right">$15</td>--}}
{{--                                            </tr>--}}
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Toplam</strong></td>
                                                <td class="no-line text-right">
                                                    <h4 class="m-0"> <?=number_format($order->amount, 2)?> <i class="fa fa-lira-sign"></i></h4>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-2"><i class="fa fa-print"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
