@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="panel-default">
                        <h2 class="panel-heading"> {{ trans('admin.test_message') }} </h2>
                    </div>
                    <hr>
                    <br>
                    <form class="parsley-style-1" action="{{route('tests.store','test')}}" method="post">
                        {{csrf_field()}}

                        @if(count($questions) > 0)
                            <?php $i = 1; ?>
                            @foreach($questions as $question)
                                @if ($i > 1) @endif
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <span class="text-info"> Question {{ $i }} : </span>
                                                {!! nl2br(session('lang') == 'ar' ? $question->question_ar : $question->question_en) !!}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <span class="text-info"> Explanation : </span>
                                                {!! nl2br($question->description) !!}
                                            </h6>
                                            <br><br>
                                            <input type="hidden" name="questions[{{ $i }}]" value="{{ $question->id }}">
                                            @foreach($question->options as $option)
                                                <label
                                                    class="block text-gray-500 font-semibold sm:border-r sm:pr-4 radio-inline">
                                                    <input type="radio" name="answers[{{ $question->id }}]"
                                                           value="{{ $option->id }}" required>
                                                    <span class="text-primary">{{$option->option}}</span>
                                                </label>
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        @endif

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
