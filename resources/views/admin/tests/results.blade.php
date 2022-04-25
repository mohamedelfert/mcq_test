@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($results) > 0)
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('admin.user_name')}}</th>
                                        <th>{{trans('admin.test_id')}}</th>
                                        <th>{{trans('admin.date')}}</th>
                                        <th>{{trans('admin.result')}}</th>
                                        <th>{{trans('admin.control')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $i = 1; ?>
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $result->user->name }}</td>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->created_at }}</td>
                                        <td>{{ $result->result }} / 10</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('results.show',$result->id) }}">show</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('admin.user_name')}}</th>
                                        <th>{{trans('admin.test_id')}}</th>
                                        <th>{{trans('admin.date')}}</th>
                                        <th>{{trans('admin.result')}}</th>
                                        <th>{{trans('admin.control')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">لا يوجد اي نتائج اختبارات</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
