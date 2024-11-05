@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Edit Freqeuntly Asked Question</h2>
        </div>

        <div class="row">
            <form action="{{ route('update.FAQ', $findFAQ->faq_id) }}" method="post">
                @csrf
                <div class="col-md-4 mx-auto">
                    <label for="ques" class="form-label mb-0">Question: </label>
                    <input type="text" class="form-control" name="question" value="{{ $findFAQ->question }}">
                    <small class="text-danger">
                        @error('question')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-2">
                    <label for="ques" class="form-label mb-0">Answer: </label>
                    <textarea name="answer" cols="30" rows="5" class="form-control" style="resize: none">
                        {{old('answer', trim($findFAQ->answer))}}
                    </textarea>
                    <small class="text-danger">
                        @error('answer')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mx-auto mt-2">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
