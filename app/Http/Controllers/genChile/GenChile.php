<?php

namespace App\Http\Controllers\genChile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenChile extends Controller
{
    public function index(Request $request){
        $associateid = $request->associateid;
        $conection = \DB::connection('sqlsrv');
            $sponsor = $conection->select("SELECT associateName as nombre FROM Sponsor_CHL where associateid = $associateid;");
            $response = $conection->select("exec Sp_GenOV_CHL $associateid;");
        \DB::disconnect('sqlsrv');
        return view('genChile.genChile', compact('response', 'sponsor', 'associateid'));
    }

    public function exportExcel(Request $request){
        $associateid = $request->associateid;
        $conection = \DB::connection('sqlsrv');
            $sponsor = $conection->select("SELECT associateName as nombre FROM Sponsor_CHL where associateid = $associateid;");
            $response = $conection->select("exec Sp_GenOV_CHL $associateid;");
        \DB::disconnect('sqlsrv');

        return view('genChile.export', compact('associateid', 'response', 'sponsor'));
    }
}
