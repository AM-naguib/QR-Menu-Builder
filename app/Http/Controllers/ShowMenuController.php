<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowMenuController extends Controller
{
    public function index($menu)
    {
        $menu = Menu::where("name", "$menu")->with("categories")->first();
        if (!$menu) {
            abort(404);
        }
        return view("menu.index", compact("menu"));
    }

    public function showQr($menu)
    {
        $menu = Menu::where("name", "$menu")->with("categories")->first();
        if (!$menu) {
            abort(404);
        }
        $url = url("menu/$menu->name");
        return view("menu.qrcode", compact("url", "menu"));
    }
    public function downloadQRCode(Request $request)
    {
        return response()->streamDownload(
            function () use ($request) {
                echo QrCode::size(200)
                    ->format('png')
                    ->generate($request->url);
            },
            'qr-code.png',
            [
                'Content-Type' => 'image/png',
            ]
        );
    }

}
