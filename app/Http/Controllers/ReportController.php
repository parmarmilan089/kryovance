<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Yajra\DataTables\DataTables;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;

class ReportController extends Controller
{
    //
    public function index() {
        $data = [];
        $data['title'] = 'Report Listt';
        $data['menu_active_tab'] = 'report-listt';

        return view('admin.report.list')->with($data);
    }
}
