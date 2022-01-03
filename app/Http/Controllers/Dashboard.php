<?php

namespace App\Http\Controllers;

use App\Charts\CompletedChart;
use App\Models\Todo;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompletedChart $chart)
    {

        $todos = Todo::where('user_id', auth()->id())->get();

        $completed = Todo::where('user_id', auth()->id())
            ->where('isDone', true)
            ->count();

        $pending = Todo::where('user_id', auth()->id())
            ->where('isDone', false)
            ->count();

        return view('dashboard')->with([
            'todos' => $todos,
            'completed' =>  $completed,
            'pending' =>  $pending,
            'chart' => $chart->build()
        ]);
    }
}
