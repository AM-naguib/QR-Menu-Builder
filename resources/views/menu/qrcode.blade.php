@extends('menu.layouts.app')
@section("title", $menu->name)
@section('content')
    <style>
        @media print {
            .noPrint {
                display: none;
            }
            .print-date-time {
                display: none;
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="qr d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
                <div>
                    {!! QrCode::size(200)->generate($url) !!}
                </div>
                <button class="btn btn-primary mt-3 noPrint" onclick="window.print();" >Print QrCode</button>

            </div>
        </div>
    </div>
@endsection
