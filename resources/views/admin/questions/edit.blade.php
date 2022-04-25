@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ adminUrl('questions') }}">{{ trans('admin.back') }}</a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    {!! Form::model($question, ['method' => 'PATCH','route' => ['questions.update', $question->id]]) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                <label
                                    class="form-label"> {{ session('lang') === 'ar' ? trans('admin.name_ar') : trans('admin.name_en') }} </label>
                                <select name="topic_id" id="select-beast"
                                        class="form-control nice-select custom-select" required>
                                    <option value="" selected disabled> {{ trans('admin.chose_topic') }} </option>
                                    @foreach($topics as $topic)
                                        <option
                                            value="{{ $topic->id }}" {{ $question->topic_id == $topic->id ? 'selected' : '' }}> {{ session('lang') === 'ar' ? $topic->name_ar : $topic->name_en }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mg-b-20" style="margin-top: 10px">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> {{ trans('admin.question_ar') }} <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper" name="question_ar"
                                       value="{{ $question->question_ar }}"
                                       type="text" required>
                            </div>
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> {{ trans('admin.question_en') }} <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper" name="question_en"
                                       value="{{ $question->question_en }}"
                                       type="text" required>
                            </div>
                        </div>

                        <div class="row mg-b-20" style="margin-top: 10px">
                            <div class="parsley-input col-md-12" id="fnWrapper">
                                <label> {{ trans('admin.description') }} <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" rows="6"
                                          required>{{ $question->description }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
