@extends('layouts.admin')
@section('title','Dashboard')

@section('content')
            <!-- Row Card No Padding -->
            <div class="row row-card-no-pd">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-tint"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Blood Donors</p>
                                        <h4 class="card-title">1,294</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Volunteers Request</p>
                                        <h4 class="card-title">1,345</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fas fa-hand-holding-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Today Blood Requests</p>
                                        <h4 class="card-title">23</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                                            <i class="far fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Blood Banks</p>
                                        <h4 class="card-title">+45K</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
