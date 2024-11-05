@extends('adminDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">Edit Inventory</h2>
        </div>

        <form action="{{ route('update.specific.inventory', $findInventory->inventory_id) }}" class="form bg-light p-4 rounded" method="POST">
            @csrf
            <div class="row mt-4">
                <h4 class="text-uppercase">Inventory Item Information:</h4>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="itemName" class="form-label mb-0">Enter Item Name: </label>
                    <input type="text" class="form-control" name="item_name" value="{{$findInventory->item_name}}">
                    <small class="text-danger">
                        @error('item_name')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4">
                    <label for="itemCategory" class="form-label mb-0">Select Item Category: </label>
                    @php
                        $itemCategories = [
                            'Vegetables',
                            'Meats',
                            'Diary',
                            'Grains',
                            'Seafood',
                            'Nuts and Seeds',
                            'Fats and Oils',
                            'Sweets and Sugars',
                            'Beverages',
                        ];
                    @endphp
                    <select name="item_category" class="form-select">
                        @foreach ($itemCategories as $val)
                            <option value="{{ $val }}" {{$findInventory->item_category == $val ? 'selected' : ''}}>{{ $val }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger">
                        @error('item_category')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4">
                    <label for="itemVariant" class="form-label mb-0">Select Item Variant: </label>
                    @php
                        $itemVariant = [
                            'Organic',
                            'Frozen',
                            'Fresh',
                            'Canned',
                            'Processed',
                            'Low-Fat',
                            'Dehydrated',
                            'Sweets and Sugars',
                            'Pre-Cooked',
                        ];
                    @endphp
                    <select name="item_variant" class="form-select">
                        @foreach ($itemVariant as $val)
                            <option value="{{ $val }}" {{$findInventory->item_variant == $val ? 'selected' : ''}}>{{ $val }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger">
                        @error('item_variant')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="itemQuantity" class="form-label mb-0">Select Item Quantity: </label>
                    <div class="input-group">
                        <select name="item_quantity" class="form-select">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{$findInventory->item_quantity == $i ? 'selected' : ''}}>{{ $i }}</option>
                            @endfor
                        </select>
                        @php
                            $itemQuantityUnit = [
                                'g (Grams)',
                                'kg (Kilograms)',
                                'mg (Milligrams)',
                                'lb (Pounds)',
                                'oz (Ounces)',
                                'ml (Milliliters)',
                                'L (Liters)',
                                'dozen',
                            ];
                        @endphp
                        <select name="item_quantity_unit" class="form-select">
                            @foreach ($itemQuantityUnit as $val)
                                <option value="{{ $val }}" {{$findInventory->item_quantity_unit == $val ? 'selected' : ''}}>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="purchaseDate" class="form-label mb-0">Select Purchase Date: </label>
                    <input type="date" class="form-control" name="purchase_date" value="{{$findInventory->item_purchase_date}}">
                    <small class="text-danger">
                        @error('purchase_date')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="itemCost" class="form-label mb-0">Enter Item Cost: </label>
                    <input type="number" class="form-control" name="item_cost" value="{{$findInventory->item_cost}}">
                    <small class="text-danger">
                        @error('item_cost')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
            </div>

            <div class="row mt-4">
                <h4 class="text-uppercase">Supplier Information:</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="supplierName" class="form-label mb-0">Enter Supplier Name: </label>
                    <input type="text" class="form-control" name="supplier_name" value="{{$findInventory->supplier_name}}">
                    <small class="text-danger">
                        @error('supplier_name')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-4">
                    <label for="supplierContactNo" class="form-label mb-0">Enter Supplier Contact No: </label>
                    <input type="number" class="form-control" name="supplier_contactno" value="{{$findInventory->supplier_contactno}}">
                    <small class="text-danger">
                        @error('supplier_contactno')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mt-3">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
