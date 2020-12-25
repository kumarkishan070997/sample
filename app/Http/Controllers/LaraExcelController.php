<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class LaraExcelController extends Controller
{
    public function download()
    {
    	//To download file in Excel Format
    	return Excel::download(new UsersExport, 'users.xlsx');
    }
}
