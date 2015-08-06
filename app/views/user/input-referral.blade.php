@extends('layout.default')


@section('content')

<div class="page-header" id="banner">
    <div class="text-center">
        <h3>Hi, {{ Auth::user()->firstname }}, you can change your referral code here :)</h3>
        <p>Share your referral code to your friends, and get Rp.50,000 When they order a storage box!</p>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-3">
            @include('user._side')
        </div>

        <div class="col-lg-9">

            <div class="panel panel-default">
                <div class="panel-body setting-board">

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            {{ Form::open(['method' => 'PUT', 'route' => 'user.referral', 'class' => 'form-horizontal change-referral-code-form' ]) }}
                            <fieldset>

                                <span class="error-alert update-profile-err"></span>
                                <span class="success-alert update-profile-scs"></span>

                                <p>Anda hanya bisa mengaturnya satu kali.</p>

                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
                                            {{ Form::text('ref_code', null, [ 'name' => 'ref_code', 'class' => 'form-control floating-label', 'placeholder' => 'Your Refferal Code' ]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary" data-loading-text="Menyimpan...">
                                            <i class="fa fa-check-square-o"></i> Simpan
                                        </button>
                                    </div>
                                </div>

                            </fieldset>
                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@stop