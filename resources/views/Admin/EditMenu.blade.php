@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Edit Menu</h2>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('updateMenuRecord', ['id' => $findRecord->menu_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mx-auto mt-3">
                        <label for="image" class="form-label mb-0">Upload Menu Image: </label>
                        <input type="file" class="form-control" name="itemImage" value="{{ $findRecord->item_image }}">
                        <small class="text-muted text-danger">
                            @error('menuImage')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8 mx-auto mt-3">
                        <label for="menuLabel" class="form-label mb-0">Enter Menu Label: </label>
                        <input type="text" class="form-control" name="itemLabel" value="{{ $findRecord->item_label }}">
                        <small class="text-muted text-danger">
                            @error('menuLabel')
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
                                <option value="{{ $val }}"
                                    {{ $findRecord->item_category == $val ? 'selected' : '' }}>{{ $val }}</option>
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
                        <input type="number" class="form-control" name="itemPrice" id="item-price"
                            value="{{ $findRecord->item_price }}">
                        <small class="text-danger">
                        @error('itemPrice')
                            {{ $message }}
                        @enderror
                        </small>
                    </div>


                    <div class="col-md-8 mx-auto mt-3">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
