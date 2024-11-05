@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Add New Menu</h2>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('storeMenu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mx-auto mt-3">
                        <label for="image" class="form-label mb-0">Upload Item Image: </label>
                        <input type="file" class="form-control" name="itemImage">
                        <small class="text-danger">
                            @error('itemImage')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8 mx-auto mt-3">
                        <label for="menuLabel" class="form-label mb-0">Enter Item Label: </label>
                        <input type="text" class="form-control" name="itemLabel">
                        <small class="text-danger">
                            @error('itemImage')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8 mx-auto mt-3">
                        <label for="item-category" class="form-label mb-0">Select Item Category: </label>
                        <select name="itemCategory" id="item-category" class="form-select">
                            @php
                                $itemCategories = [
                                    'Breakfast',
                                    'Lunch',
                                    'Dinner',
                                    'Wedding',
                                    'Birthday Party',
                                    'Corporate Events',
                                    'Family Get Together',
                                    'Holiday Parties',
                                ];
                            @endphp
                            @foreach ($itemCategories as $val)
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endforeach

                        </select>
                        <small class="text-danger">
                            @error('itemCategory')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8 mx-auto mt-3">
                        <label for="item-price" class="form-label mb-0">Enter Item Price: </label>
                        <input type="number" class="form-control" name="itemPrice" id="item-price">
                        <small class="text-danger">
                            @error('itemPrice')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8 mx-auto mt-3">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
