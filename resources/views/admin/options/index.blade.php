@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <button type="button" class="modal-effect btn btn-success" data-effect="effect-scale"
                                data-toggle="modal" data-target="#add">
                            <i class="ti-plus"></i> {{trans('admin.add_option')}}
                        </button>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>{{trans('admin.question_ar')}}</th>
                                <th>{{trans('admin.option')}}</th>
                                <th>{{trans('admin.point')}}</th>
                                <th>{{trans('admin.control')}}</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $i = 1; ?>
                            @foreach($options as $option)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$option->question->question_ar}}</td>
                                    <td>{{$option->option}}</td>
                                    <td>{{$option->point}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#edit{{ $option->id }}" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{ $option->id }}" title="حذف">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Edit -->
                                <div class="modal fade" id="edit{{ $option->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">{{trans('admin.edit_option')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('options.update','test') }}" method="post">
                                                {{ method_field('patch') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="form-label"> {{ session('lang') === 'ar' ? trans('admin.question_ar') : trans('admin.question_en') }} </label>
                                                            <select name="question_id" id="select-beast"
                                                                    class="form-control nice-select custom-select" required>
                                                                <option value="" selected disabled> {{ trans('admin.chose_question') }} </option>
                                                                @foreach($questions as $question)
                                                                    <option value="{{ $question->id }}" {{ $question->id === $option->question_id ? 'selected' : '' }}>
                                                                        {{ session('lang') === 'ar' ? $question->question_ar : $question->question_en  }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <input type="hidden" name="id" id="id" value="{{ $option->id }}">
                                                            <label
                                                                for="exampleInputEmail1">{{trans('admin.option')}}</label>
                                                            <input type="text" class="form-control" id="option"
                                                                   name="option" value="{{ $option->option }}"
                                                                   required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">{{trans('admin.point')}}</label>
                                                            <input type="text" class="form-control" id="point" name="point"
                                                                   value="{{ $option->point }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">{{trans('admin.btn_confirm')}}</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('admin.btn_close')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit -->

                                <!-- Delete -->
                                <div class="modal fade" id="delete{{ $option->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('admin.delete_option')}}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('options.destroy','test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{trans('admin.msg_delete')}}</p><br>
                                                    <input type="hidden" name="id" id="id" value="{{ $option->id }}">
                                                    <input class="form-control" name="option" id="option" type="text"
                                                           value="{{ $option->option }}" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('admin.btn_close')}}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{trans('admin.btn_confirm')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete -->

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New  -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('admin.add_option')}}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('options.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col">
                                    <label class="form-label"> {{ session('lang') === 'ar' ? trans('admin.question_ar') : trans('admin.question_en') }} </label>
                                    <select name="question_id" id="select-beast"
                                            class="form-control nice-select custom-select" required>
                                        <option value="" selected disabled> {{ trans('admin.chose_question') }} </option>
                                        @foreach($questions as $question)
                                            <option value="{{ $question->id }}">
                                                {{ session('lang') === 'ar' ? $question->question_ar : $question->question_en  }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1">{{trans('admin.option')}}</label>
                                    <input type="text" class="form-control" id="option" name="option"
                                           value="{{old('option')}}" required>
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1">{{trans('admin.point')}}</label>
                                    <input type="text" class="form-control" id="point" name="point"
                                           value="{{old('point')}}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                        class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{trans('admin.btn_close')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add New -->

    </div>
    <!-- row closed -->
@endsection
