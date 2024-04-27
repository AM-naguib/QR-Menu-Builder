@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <button type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalSignIn">Add
            Menu</button>

        <h1>All Menus</h1>

    </div>
    <div class="row justify-content-lg-center">
        <div id="message" class="col-12 col-lg-6 text-center">
            @include('dashboard.inc.message')
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Menu</th>
                                <th>QR</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (count($menus) > 0)
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td><a href="{{url("menu/$menu->name")}}" class="btn btn-primary">Show Menu</a></td>
                                        <td><a href="{{url("qr/$menu->name")}}" class="btn btn-primary">Show Qr</a></td>
                                        <td class="d-flex gap-3">
                                            <a href="{{ route('dashboard.menus.edit', $menu->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('dashboard.menus.destroy', $menu->id) }}" method="POST"
                                                id="forms">

                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-danger" id="formSubmit" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Add Menu Modal  -->
    <div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="refff"></button>
                </div>
                <div class="modal-body px-md-5">
                    <h2 class="h4 text-center">Add Menu</h2>
                    <p class="text-center text-success" id="resMessage"></p>
                    <form action="{{ route('dashboard.menus.store') }}" method="post" id="addMenuForm">
                        @csrf
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="text">Menu Name</label>
                            <input type="text" class="form-control" id="text" placeholder="Enter Menu Name"
                                name="menu_name">
                        </div>
                        <!-- End of Form -->

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Menu Modal -->

    <!-- Edit Menu Modal  -->
    {{-- <div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="refff"></button>
                </div>
                <div class="modal-body px-md-5">
                    <h2 class="h4 text-center">Edit Menu</h2>
                    <p class="text-center text-success" id="resMessage"></p>
                    <form action="{{ route('dashboard.menus.update',$menu) }}" method="post" id="addMenuForm">
                        @csrf
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="text">Menu Name</label>
                            <input type="text" class="form-control" id="text" placeholder="Enter Menu Name"
                                name="menu_name">
                        </div>
                        <!-- End of Form -->

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div> --}}
    <!-- End of Edit Menu Modal -->

    <script>
        let refButton = document.getElementById("refff");
        let resMessage = document.getElementById("resMessage");
        refButton.addEventListener("click", function() {
            location.reload();
        });
        let addMenuForm = document.getElementById('addMenuForm');
        sendFormSubmit(addMenuForm, "POST");

        function sendFormSubmit(form, method) {

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                let formData = new FormData(form);
                let jsonData = {};

                formData.forEach((value, key) => {
                    jsonData[key] = value;
                });

                let jsonString = JSON.stringify(jsonData);
                let xhr = new XMLHttpRequest();
                xhr.open("post", form.action);
                xhr.setRequestHeader("X-CSRF-TOKEN", form._token.value);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("Accept", "application/json");
                xhr.send(jsonString);
                xhr.onload = () => {
                    if (xhr.status == 200) {
                        let res = JSON.parse(xhr.responseText);
                        resMessage.innerHTML = res
                        form.reset();
                    }

                }
            });
        }
    </script>
    {{-- <script>
        window.onload = () => {
            let formSubmit = document.querySelectorAll('#formsSubmit');
            let form = document.querySelectorAll('#forms');
            formSubmit.forEach((item, key) => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    let formData = new FormData(form[key]);
                    let jsonData = {};
                    formData.forEach((value, key) => {
                        jsonData[key] = value;
                    })
                    let jsonString = JSON.stringify(jsonData);
                    let xhr = new XMLHttpRequest();
                    xhr.open("delete", form[key].action);
                    xhr.setRequestHeader("X-CSRF-TOKEN", form[key]._token.value);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.setRequestHeader("Accept", "application/json");
                    xhr.send(jsonString);
                    xhr.onload = () => {
                        if (xhr.status == 200) {
                            item.parentElement.parentElement.remove();
                            let messageContaner = document.querySelector('#message');
                            let res = JSON.parse(xhr.responseText);
                            messageContaner.innerHTML =
                                `<div class="alert alert-success">${res.message}</div>`

                        }
                    }
                })

            })

        }
    </script> --}}
@endsection
