@extends('admin.index')
@push('css')
    <style>
        @media print {
            #results, #test, #result_print {
                display: none;
            }
        }
    </style>
@endpush
@section('content')
    <!-- row -->
    <div class="row">
        <div class="panel panel-default col-lg-12 col-md-12 col-sm-12">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" id="print">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>User</th>
                                <td>{{ $test->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ $test->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Score</th>
                                <td>{{ $test->result }} / 10</td>
                            </tr>
                            </tbody>
                        </table>
                        <?php $i = 1; ?>
                        @foreach ($results as $result)
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr class="test-option-true text-success">
                                    <th style="width: 10%">Question #{{$i}}</th>
                                    <th>{{ $result->question->{'question_' . session('lang')} }}</th>
                                </tr>
                                <tr>
                                    <td>Topic</td>
                                    <td>
                                        <div
                                            class="code_snippet">{{ $result->question->topic->{'name_' . session('lang')} }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Explanation</td>
                                    <td>
                                        <div class="code_snippet">{{ $result->question->description}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Options</td>
                                    <td>
                                        <ul>
                                            @foreach ($result->question->options as $option)
                                                <li style="@if($option->point === 1) font-weight: bold; @endif">
                                                    {{ $option->option}}
                                                    @if ($option->point === 1)<em style="color: red;">
                                                        ( correct answer )</em> @endif
                                                    @if ($result->option_id === $option->id)
                                                        <em style="color: blue;font-weight: bold;">( your answer )</em> @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <?php $i++ ?>
                        @endforeach
                        <a href="{{ adminUrl('results') }}" class="btn btn-primary" id="results">see all my results</a>
                        <a href="{{ adminUrl('tests') }}" class="btn btn-danger" id="test">take new test</a>
                        <a href="#" class="btn btn-info" id="result_print" onclick="printOrder()">
                            <i class="fas fa-print ml-1"></i> Print
                        </a>
                    </div>
                </div>

                <p>&nbsp;</p>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@push('js')
    <script>
        function printOrder() {
            var content = document.getElementById('print').innerHTML;
            document.body.innerHTML = content;
            window.print();
            location.reload();
        }
    </script>
@endpush
