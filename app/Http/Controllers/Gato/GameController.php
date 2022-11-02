<?php

namespace App\Http\Controllers\Gato;

use App\Http\Controllers\Controller;
use Exception;
use PDF;

class GameController extends Controller
{
    public function DownloadDocument($code)
    {
        try
        {
            // Convertir b64
            $b64 = substr($code, 2);
            $data=json_decode(base64_decode($b64));
            // dd($data);
            $pdf = PDF::loadView("docs.winner", compact("data"));
            $pdf->setPaper('A5', 'portrait');
            return $pdf->stream("winner.pdf");
        }
        catch (Exception $e)
        {
            dd($e);
        }
    }
}
