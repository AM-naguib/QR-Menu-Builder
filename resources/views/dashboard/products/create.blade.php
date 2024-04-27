@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <h1>Add Product</h1>
    </div>
    <div id="message" class="col-12 col-lg-6 text-center mx-auto">
        @include('dashboard.inc.message')
    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-4">
            <form action="{{ route('dashboard.products.store') }}" class="form" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Product Name" value="{{ old('name') }}">
                </div>
                <div class="mb-2">
                    <label for="price" class="form-label">Product Price</label>
                    <div class="normal-price" id="normal-price">
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="checkbox">
                        <label for="myCheckbox">Sizes ?</label>
                        <input type="checkbox" id="myCheckbox" onchange="checkBoxChanged()">
                    </div>
                    <div class="sizes d-flex text-center gap-3 align-items-center">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="menu" class="form-label">Select Menu</label>
                    <select name="menu_id" id="menu" class="form-select">
                        <option>Select Menu</option>
                        @if (count($menus) > 0)
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label">Select Category</label>
                    <select name="category_id" id="categories" class="d-none form-select">
                    </select>
                </div>
                <button class="btn btn-success text-light" type="submit">Add Product</button>
            </form>
        </div>
    </div>

    <script>
        function checkBoxChanged() {
            let sizes = document.querySelector('.sizes');
            let normalPrice = document.getElementById('normal-price');
            var checkbox = document.getElementById("myCheckbox");
            if (checkbox.checked) {
                sizes.innerHTML = `<div class="smalll">
                            <label for="small" class="form-label">Small</label>
                            <input type="number" class="form-control" id="small" name="small">
                        </div>
                        <div class="medium">
                            <label for="medium" class="form-label">Medium</label>
                            <input type="number" class="form-control" id="medium" name="medium">
                        </div>
                        <div class="large">
                            <label for="large" class="form-label">Large</label>
                            <input type="number" class="form-control" id="large" name="large">
                        </div>
                        <div class="extra_large">
                            <label for="extra_large" class="form-label">XLarge</label>
                            <input type="number" class="form-control" id="extra_large" name="extra_large">
                        </div>`;

                normalPrice.innerHTML = '';
            } else {
                sizes.innerHTML = '';
                normalPrice.innerHTML = `
                <input type="number" class="form-control" id="price" name="price">
                `;

            }
        }
        document.getElementById('menu').addEventListener('change', function() {
            let selectedValue = this.value;
            $xhr = new XMLHttpRequest();
            $xhr.open('GET', 'http://127.0.0.1:8000/categoriesMenu?menu_id=' + selectedValue);
            $xhr.send();

            $xhr.onload = () => {
                let categories = JSON.parse($xhr.responseText);
                let select = document.getElementById('categories');
                select.innerHTML = '';
                for (let category of categories) {
                    let option = document.createElement('option');
                    option.value = category.id;
                    option.innerText = category.name;
                    select.appendChild(option);
                }
                select.classList.remove('d-none');

            }

        });
    </script>
@endsection
