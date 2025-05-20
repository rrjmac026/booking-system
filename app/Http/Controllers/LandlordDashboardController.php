<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use FPDF;

class LandlordDashboardController extends Controller
{
    public function index()
    {
        $tenants = User::where('role', 'tenant')->get();
        $totalTenants = User::where('role', 'tenant')->count();
        $totalFreeTenants = User::where('role', 'tenant')->where('subscription', 'free')->count();
        $totalProTenants = User::where('role', 'tenant')->where('subscription', 'pro')->count();

        return view('landlord.dashboard', compact('totalTenants', 'totalFreeTenants', 'totalProTenants', 'tenants'));
    }

    public function generateReports(){
        $tenants = User::where('role', 'tenant')->get();
        $totalTenants = $tenants->count();
        $totalFreeTenants = $tenants->where('subscription', 'free')->count();
        $totalProTenants = $tenants->where('subscription', 'pro')->count();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Tenant Report', 0, 1, 'C');
        $pdf->Ln(5);

        // Totals
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 8, "Total Tenants: $totalTenants", 0, 1);
        $pdf->Cell(0, 8, "Total Free Tenants: $totalFreeTenants", 0, 1);
        $pdf->Cell(0, 8, "Total Pro Tenants: $totalProTenants", 0, 1);
        $pdf->Ln(8);

        // Table Header
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 8, 'Name', 1);
        $pdf->Cell(50, 8, 'Email', 1);
        $pdf->Cell(30, 8, 'Subscription', 1);
        $pdf->Cell(30, 8, 'Subdomain', 1);
        $pdf->Cell(25, 8, 'Created At', 1);
        $pdf->Cell(35, 8, 'Expiration Date', 1);
        $pdf->Ln();

        // Table Rows
        $pdf->SetFont('Arial', '', 12);
        foreach ($tenants as $tenant) {
            $pdf->Cell(40, 8, $tenant->name, 1);
            $pdf->Cell(50, 8, $tenant->email, 1);
            $pdf->Cell(30, 8, ucfirst($tenant->subscription), 1);
            $pdf->Cell(30, 8, $tenant->subdomain ?? '-', 1);
            $pdf->Cell(25, 8, $tenant->created_at ? $tenant->created_at->format('Y-m-d') : '-', 1);
            $pdf->Cell(35, 8, $tenant->expiration_date ?? '-', 1);
            $pdf->Ln();
        }

        $fileName = 'tenant_report.pdf';
        $pdf->Output('F', $fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
