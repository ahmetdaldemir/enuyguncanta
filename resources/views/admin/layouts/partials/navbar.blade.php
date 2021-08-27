<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-left">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a style="    font-size: 20px;font-weight: 800;" href="/admin/" class="logo logo-dark">
                        ENUYGUN ÇANTA
                    </a>

                    <a style="    font-size: 20px;font-weight: 800;"  href="/admin/" class="logo logo-light">
                        ENUYGUN ÇANTA
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                    <i class="mdi mdi-menu"></i>
                </button>
            </div>

            <div class="float-right">

                <div class="dropdown d-none d-lg-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen font-size-24"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="font-size: 30px;" class="fas fa-user-circle"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item d-block" href="/admin/settings"><i class="ti-settings"></i> &nbsp; Ayarlar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/logout"><i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i> {{ __('Oturumu Kapat') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top-navigation">
        <div class="page-title-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <h4>Uygun Çanta Yönetim Paneli</h4>
                            <ol class="breadcrumb m-0">
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>--}}
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>--}}
{{--                                <li class="breadcrumb-item active">Horizontal Layout</li>--}}
                            </ol>
                        </div>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="state-information d-none d-sm-block">--}}
{{--                            <div class="state-graph float-right">--}}
{{--                                <div id="header-chart-1"></div>--}}
{{--                                <div class="info">Balance $ 2,317</div>--}}
{{--                            </div>--}}
{{--                            <div class="state-graph">--}}
{{--                                <div id="header-chart-2"></div>--}}
{{--                                <div class="info">Item Sold 1230</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- end page title -->
            </div>
        </div>

        <div class="container-fluid">
            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/">
                                    <i class="ti-dashboard"></i>Yönetim
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/orders/index/1">
                                    <i class="ti-shopping-cart"></i>Siparişler
                                </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="/admin/products">--}}
{{--                                    <i class="ti-view-list"></i>Ürünler--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button"--}}
{{--                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="ti-layout-grid4-alt"></i>Marka / Kategori--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">--}}
{{--                                    <a href="/admin/catalog/brands" class="dropdown-item">Markalar</a>--}}
{{--                                    <a href="/admin/catalog/categories" class="dropdown-item">Kategoriler</a>--}}
{{--                                    <a href="/admin/catalog/color" class="dropdown-item">Renkler</a>--}}
{{--                                    <a href="/admin/catalog/attributes" class="dropdown-item">Ürün Özellikleri</a>--}}
{{--                                    <a href="/admin/catalog/variants" class="dropdown-item">Ürün Varyant</a>--}}
{{--                                    <a href="/admin/catalog/orderstatus" class="dropdown-item">Sipariş Durumları</a>--}}
{{--                                    <a href="/admin/shipmentscompanies" class="dropdown-item">Kargo Firmaları</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="/admin/customers">--}}
{{--                                    <i class="ti-user"></i>Müşteriler--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/shipments">
                                    <i class="ti-truck"></i>Kargo İşlemleri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/users">
                                    <i class="ti-unlock"></i>Kullanıcılar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/settings">
                                    <i class="ti-settings"></i>Ayarlar
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
