@extends('admin.layouts.layouts-horizontal-master')

@section('title') Yönetim Paneli @endsection

@section('content')
     <!-- start page title -->
<div class="row">

    @component('admin.common-components.dashboard-widget')
         @slot('icons') mdi mdi-cube-outline float-right  @endslot
         @slot('title') Orders  @endslot
         @slot('price') 1,587  @endslot
         @slot('badgeClass') badge-info @endslot
         @slot('per') +11%  @endslot
    @endcomponent

    @component('admin.common-components.dashboard-widget')
         @slot('icons') mdi mdi-buffer float-right  @endslot
         @slot('title') Revenue  @endslot
         @slot('price') $46,782  @endslot
         @slot('badgeClass') badge-danger @endslot
         @slot('per') -29%  @endslot
    @endcomponent

    @component('admin.common-components.dashboard-widget')
         @slot('icons') mdi mdi-tag-text-outline float-right  @endslot
         @slot('title') Average Price  @endslot
         @slot('price') $15.9  @endslot
         @slot('badgeClass') badge-warning @endslot
         @slot('per') 0%  @endslot
    @endcomponent


    @component('admin.common-components.dashboard-widget')
         @slot('icons') mdi mdi-briefcase-check float-right  @endslot
         @slot('title') Product Sold  @endslot
         @slot('price') 1890  @endslot
         @slot('badgeClass') badge-info @endslot
         @slot('per') +89%  @endslot
    @endcomponent

</div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap">

                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Herbert C. Patton
                                    </td>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                    <td>
                                        $14,584
                                        <p class="m-0 text-muted font-14">Amount</p>
                                    </td>
                                    <td>
                                        5/12/2016
                                        <p class="m-0 text-muted font-14">Date</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-3.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Mathias N. Klausen
                                    </td>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                    <td>
                                        $8,541
                                        <p class="m-0 text-muted font-14">Amount</p>
                                    </td>
                                    <td>
                                        10/11/2016
                                        <p class="m-0 text-muted font-14">Date</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-4.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Nikolaj S. Henriksen
                                    </td>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                    <td>
                                        $954
                                        <p class="m-0 text-muted font-14">Amount</p>
                                    </td>
                                    <td>
                                        8/11/2016
                                        <p class="m-0 text-muted font-14">Date</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-5.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Lasse C. Overgaard
                                    </td>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                    <td>
                                        $44,584
                                        <p class="m-0 text-muted font-14">Amount</p>
                                    </td>
                                    <td>
                                        7/11/2016
                                        <p class="m-0 text-muted font-14">Date</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-6.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Kasper S. Jessen
                                    </td>
                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                    <td>
                                        $8,844
                                        <p class="m-0 text-muted font-14">Amount</p>
                                    </td>
                                    <td>
                                        1/11/2016
                                        <p class="m-0 text-muted font-14">Date</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Orders</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-1">

                            <tbody>
                                <tr>
                                    <td>#12354781</td>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-1.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Riverston Glass Chair
                                    </td>
                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                    <td>
                                        $185
                                    </td>
                                    <td>
                                        5/12/2016
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#52140300</td>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Shine Company Catalina
                                    </td>
                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                    <td>
                                        $1,024
                                    </td>
                                    <td>
                                        5/12/2016
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#96254137</td>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-3.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Trex Outdoor Furniture Cape
                                    </td>
                                    <td><span class="badge badge-pill badge-danger">Cancel</span></td>
                                    <td>
                                        $657
                                    </td>
                                    <td>
                                        5/12/2016
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#12365474</td>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-4.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Oasis Bathroom Teak Corner
                                    </td>
                                    <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                    <td>
                                        $8451
                                    </td>
                                    <td>
                                        5/12/2016
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#85214796</td>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-5.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> BeoPlay Speaker
                                    </td>
                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                    <td>
                                        $584
                                    </td>
                                    <td>
                                        5/12/2016
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#12354781</td>
                                    <td>
                                        <img src="{{ URL::asset('/images/users/user-6.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Riverston Glass Chair
                                    </td>
                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                    <td>
                                        $185
                                    </td>
                                    <td>
                                        5/12/2016
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                    </td>
                                </tr>

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
