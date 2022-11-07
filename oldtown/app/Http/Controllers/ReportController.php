<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $report = DB::table('report')->paginate(10);
        return view('report.report', compact('report'));
    }

    public function generateReport()
    {

        return view('report.generate-report');
    }



    public function generateDailyReport()
    {
        $today = date('Y/m/d');
        $report = DB::table('customer_completed')->where('completed_at', $today)->get();
        $cost = 0;
        $sale = 0;
        $profit = 0;

        foreach( $report as $name)
        {
            $cost += $name->sum_cost;
            $sale += $name->total_price;
        }

        $profit = $sale - $cost;

        DB::table('report')->insert([
            'generated_by' => Auth::user()->first_name . ' ' .  Auth::user()->last_name,
            'sales' => $sale,
            'cost' => $cost,
            'profit' => $profit,
            'type' => 'daily',
            'report_date' => Carbon::now()
        ]);

        return redirect()->route('report')->with('status', 'Report Generated');
    }

    public function generateMonthlyReport()
    {
        $report = DB::table('customer_completed')->whereMonth('completed_at',  Carbon::now()->month)->get();

        $cost = 0;
        $sale = 0;
        $profit = 0;

        foreach( $report as $name)
        {
            $cost += $name->sum_cost;
            $sale += $name->total_price;
        }

        $profit = $sale - $cost;

        DB::table('report')->insert([
            'generated_by' => Auth::user()->first_name . ' ' .  Auth::user()->last_name,
            'sales' => $sale,
            'cost' => $cost,
            'profit' => $profit,
            'type' => 'monthly',
            'report_date' => Carbon::now()
        ]);

        return redirect()->route('report')->with('status', 'Report Generated');

    }

    public function downloadReport(Request $request)
    {
        $data = $request->id;

        $report = DB::table('report')->where('id', $data)->first();

        $profit = $report->profit;
        $cost = $report->cost;
        $sale = $report->sales;
        $today = $report->report_date;

        $date = date('F Y');
        if($report->type === 'daily'){
            // return view('pdf.dailyreport');
             $pdf = Pdf::loadView('pdf.dailyreport', $data = compact('profit', 'sale', 'cost', 'today' ));
             return $pdf->download('dailyreport.pdf');
        }

        if($report->type === 'monthly'){
            $pdf = Pdf::loadView('pdf.monthlyreport', $data = compact('profit', 'sale', 'cost', 'today', 'date' ));
            return $pdf->download('monthlyreport.pdf');
        }

    }

    public function deleteReport(Request $request)
    {
        $id = $request->dataid;
        DB::table('report')->delete($id);
        return redirect()->route('report')->with('status', 'Report Deleted');
    }
}