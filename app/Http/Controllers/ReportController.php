<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;
class ReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    
    public function index()
    {
        $data = Transaction::select(
            DB::raw('sum(total) as total'),
            DB::raw('sum(profit) as profit'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )->groupBy('months')->get();
        
        return view('report', compact('data'));
    }
    
    public function permonth()
    {
        $data = Transaction::select(
            DB::raw('sum(total) as total'),
            DB::raw('sum(profit) as profit'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )->groupBy('months')->get();
        
        $pdf = PDF::loadView('report.permonth', compact('data'));
        
        return $pdf->stream('report.pdf');
    }
    public function perday()
    {
        $data = Transaction::select(
            DB::raw('sum(total) as total'),
            DB::raw('sum(profit) as profit'),
            DB::raw("DATE_FORMAT(created_at,'%W, %d %M %Y') as months")
        )->groupBy('months')->get();
        
        $pdf = PDF::loadView('report.perday', compact('data'));
        
        return $pdf->stream('report.pdf');
    }
    public function perweek()
    {
        $data = Transaction::select(
            DB::raw('sum(total) as total'),
            DB::raw('sum(profit) as profit'),
            DB::raw("CONCAT_WS(' - ',DATE_FORMAT(DATE(created_at + INTERVAL (1 - DAYOFWEEK(created_at)) DAY),'%d'),DATE_FORMAT(DATE(created_at + INTERVAL (7 - DAYOFWEEK(created_at)) DAY),'%d %M %Y')) as months")
        )->groupBy('months')->get();
        
        $pdf = PDF::loadView('report.perweek', compact('data'));
        
        return $pdf->stream('report.pdf');
    }
}
