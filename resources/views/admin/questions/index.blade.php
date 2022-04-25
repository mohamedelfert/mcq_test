@extends('admin.index')
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-1 col-md-2">
                        <a class="btn btn-primary" href="{{ route('questions.create') }}">{{ trans('admin.add_question') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50'
                               style=" text-align: center;">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin.name_ar') }}</th>
                                    <th>{{ trans('admin.question_ar') }}</th>
                                    <th>{{ trans('admin.question_en') }}</th>
                                    <th>{{ trans('admin.control') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $question->topic->name_ar }}</td>
                                    <td>{{ $question->question_ar }}</td>
                                    <td>{{ $question->question_en }}</td>
                                    <td>
                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-primary"
                                           title="تعديل"><i class="fas fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{ $question->id }}" title="حذف">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Delete -->
                                <div class="modal fade" id="delete{{ $question->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('admin.delete_question')}}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('questions.destroy','test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{trans('admin.msg_delete')}}</p><br>
                                                    <input type="hidden" name="id" id="id" value="{{ $question->id }}">
                                                    <input class="form-control" name="name" id="name" type="text"
                                                           value="{{ $question->question_ar }}" readonly>
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
        <!--/div-->
    </div>
@endsection
