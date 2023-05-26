<?php

namespace App\Http\Controllers\Api;

use App\Models\Partner;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiStatisticsController extends Controller
{
    public function allApplications(){
        $allApplications = Application::count();
        return response()->json(['allApplications' => $allApplications]);

    }

    public function activeApplications(){
        $activeApplications = Application::whereDoesntHave('donation')->whereHas('applicationStatus', function($query) {
            $query->where('name', 'нова');
        })->count();

        return response()->json(['activeApplications' => $activeApplications]);

    }

    public function completedDonations(){
        $completedDonations = Application::whereHas('donation')->whereHas('applicationStatus', function($query) {
            $query->where('name', 'комплетирана');
        })->count();

        return response()->json(['completedDonations' => $completedDonations]);
    }

    public function partnersCount(){
        $partnersCount = Partner::count();

        return response()->json(['partnersNumber' => $partnersCount]);
    }
}
