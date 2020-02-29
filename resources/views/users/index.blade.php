@extends('layouts.without_footer')
@section('title', 'Users')
@section('content')
<!-- Users -->
<section id="users">

    <div class="content-box-md">

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                            <tr class="table100-head">
                                <th class="column1">Name</th>
                                <th class="column2">Email</th>
                                <th class="column3">Email verified at</th>
                                <th class="column4">Phone</th>
                                <th class="column5">Address</th>
                                <th class="column6">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="column1">{{$user->name}}</td>
                                <td class="column2">{{$user->email}}</td>
                                <td class="column3">@if(!$user->email_verified_at) Not Verified @else {{$user->email_verified_at}} @endif</td>
                                <td class="column4">@if ($user->phone){{$user->phone}} @else &nbsp; @endif</td>
                                <td class="column5">@if ($user->address){{$user->address}} @else &nbsp; @endif</td>
                                <td class="column6">@if($user->is_active==1) Active @else Closed @endif</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$users->render()}}
            </div>
        </div>

    </div>
</section>

<!-- Users Ends -->
@endSection


