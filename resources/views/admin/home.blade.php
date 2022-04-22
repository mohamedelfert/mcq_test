@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Welcome</h3>
                        <h3 class="text-center">{{ auth()->user()->name }}</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
