<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\ServerInfoDTO;
use App\DTO\ClientInfoDTO;
use App\DTO\DatabaseInfoDTO;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function serverInfo()
    {
        return response()->json(new ServerInfoDTO(phpversion()));
    }

    public function clientInfo(Request $request)
    {
        return response()->json(new ClientInfoDTO($request->ip(), $request->header('User-Agent')));
    }

    public function databaseInfo()
    {
        $dbName = DB::connection()->getDatabaseName();
        return response()->json(new DatabaseInfoDTO($dbName));
    }
}
