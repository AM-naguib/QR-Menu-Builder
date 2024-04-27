@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <h1>Edit Menu</h1>
    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-4">
            <form action="{{ route('dashboard.menus.update', $menu->id) }}" class="form" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Menu</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Menu Name"
                        value="{{ $menu->name }}">
                </div>

                <button class="btn btn-success text-light" type="submit">Edit Menu</button>
            </form>
        </div>
    </div>
@endsection
