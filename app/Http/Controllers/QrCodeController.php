<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use Illuminate\Http\Request;

use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class QrCodeController extends Controller
{
    public function index()
    {
        return redirect()->route('generate');
    }

    public function generate()
    {
        return view('generate');
    }

    public function generateQrCode(Request $request)
    {
        $linkedin = $request->input('linkedin');
        $github = $request->input('github');
        $name = trim($request->input('name'));

        $words = explode(' ', $name);
        $fullname = '';

        foreach ($words as $word) {
            if (strlen($word) > 0) {
                $fullname .= "$word ";
            }
        }

        $fullname = trim($fullname);

        $slug = explode(' ', $fullname);
        $slug = strtolower(implode('-', $slug));
        $qrCode = uniqid(rand());
        $url = route('profile', ['name' => $slug]);

        $hasQrCode = QrCode::where('slug', $slug)->first();

        if ($hasQrCode) {
            return view('qr-code', ['name' => $fullname, 'url' => $url, 'qrcode' => $hasQrCode['qrcode']]);
        }

        $renderer = new ImageRenderer(
            new RendererStyle(250),
            new ImagickImageBackEnd()
        );

        $writer = new Writer($renderer);
        $writer->writeFile($url, storage_path('app/public/qrcodes/') . "$qrCode.png");

        QrCode::create([
            'qrcode' => $qrCode,
            'name' => $fullname,
            'slug' => $slug,
            'linkedin' => $linkedin,
            'github' => $github
        ]);

        return view('qr-code', ['name' => $fullname, 'url' => $url, 'qrcode' => $qrCode]);
    }

    public function profile($slug)
    {
        $data = QrCode::where('slug', $slug)->first();

        if (!$data) {
            return abort(404);
        }

        return view('profile', [
            'name' => $data['name'],
            'linkedin' => $data['linkedin'],
            'github' => $data['github'],
            'qrcode' => $data['qrcode']
        ]);
    }

    public function entries()
    {
        $qrCodes = QrCode::all();

        if (!$qrCodes) {
            return ['qrcodes' => [], 'message' => 'No records were found.'];
        }

        $qrCodes->transform(function ($qrCode) {
            $qrCode->qrcode = asset('storage/qrcodes/' . $qrCode->qrcode . '.png');

            return $qrCode;
        });

        return ['qrcodes' => $qrCodes, 'message' => ''];
    }
}
