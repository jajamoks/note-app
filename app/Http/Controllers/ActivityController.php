<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = Auth::guard('api')->user();
    }
    public function index()
    {
        return $this->user->notes;
    }

    public function last60Minutes()
    {
        $fromDate = Carbon::now()->subMinutes(60);
        $toDate = Carbon::now();
        return response()->json($this->user->notes()
        ->where('status', '===', 0)
        ->whereBetween('created_at', [$fromDate, $toDate])
        ->count());
    }
}
