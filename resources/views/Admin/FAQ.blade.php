@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Freqeuntly Asked Question</h2>
        </div>

        <div class="row">
            <div class="col-md-5">
                <a href="{{ route('view.FAQ.Form') }}" class="btn btn-success">Add FAQ</a>
            </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>

                @foreach ($faq as $val)
                    <tr>
                        <td>{{ $val->question }}</td>
                        <td>{{ $val->answer }}</td>
                        <td>
                            <a href="{{route('edit.FAQ', $val->faq_id)}}"
                                class="text-success fa-solid fa-pen-to-square" title="Edit"></a>
                            <a href="{{route('delete.FAQ', $val->faq_id)}}"
                                class="text-danger fa-solid fa-trash" title="Delete"></a>
                        </td>
                    </tr>
                @endforeach
            </table>
          </div>
        </div>
    </div>
@endsection
