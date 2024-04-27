@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <h1>Add Category</h1>
    </div>
    <div id="message" class="col-12 col-lg-6 text-center">
        @include('dashboard.inc.message')
    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-4">
            <form action="{{ route('dashboard.categories.store') }}" class="form" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Category Name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Select Menu</label>
                    <select name="menu_id" id="" class="form-select">
                        @if (count($menus) > 0)
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button class="btn btn-success text-light" type="submit">Add Category</button>
            </form>
        </div>
    </div>
@endsection
