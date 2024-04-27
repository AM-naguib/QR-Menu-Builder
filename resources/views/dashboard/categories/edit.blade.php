@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <h1>Edit Category</h1>
    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-4">
            <form action="{{ route('dashboard.categories.update', $category->id) }}" class="form" method="post">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Category Name" value="{{ $category->name }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Select Menu</label>
                    <select name="menu_id" id="" class="form-select">
                        @if (count($menus) > 0)
                            @foreach ($menus as $menu)
                                <option @selected($menu->id == $category->menu_id) value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button class="btn btn-success text-light" type="submit">Edit Category</button>
            </form>
        </div>
    </div>
@endsection
