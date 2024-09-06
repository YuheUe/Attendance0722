<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
  public function punch()
  {
    $now_date = Carbon::now()->format('Y-m-d');
    $user_id = Auth::user()->id;
        $confirm_date = Work::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();

        if (!$confirm_date) {
            $status = 0;
        } else {
            $status = Auth::user()->status;
        }
        return view('index', compact('status'));
  }
  public function work(Request $request)
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        if ($request->has('start_rest') || $request->has('end_rest')) {
            $work_id = Work::where('user_id', $user_id)
                ->where('date', $now_date)
                ->first()
                ->id;
        }

        // 勤務開始
        if ($request->has('start_work')) {
            $attendance = new Work();
            $attendance->date = $now_date;
            $attendance->attendance_start = $now_time;
            $attendance->user_id = $user_id;
            $status = 1;
        }

        // 休憩開始
        if ($request->has('start_rest')) {
            $attendance = new Rest();
            $attendance->rest_start = $now_time;
            $attendance->work_id = $work_id;
            $status = 2;
        }

        // 休憩終了
        if ($request->has('end_rest')) {
            $attendance = Rest::where('work_id', $work_id)
                ->whereNotNull('rest_start')
                ->whereNull('rest_end')
                ->first();
            $attendance->rest_end = $now_time;
            $status = 1;
        }

        // 勤務終了
        if ($request->has('end_work')) {
            $attendance = Work::where('user_id', $user_id)
                ->where('date', $now_date)
                ->first();
            $attendance->attendance_end = $now_time;
            $status = 3;
        }

        $user = User::find($user_id);
        $user->status = $status;
        $user->save();

        $attendance->save();

        return redirect('/')->with(compact('status'));
    }

    // 日別一覧表示
    public function indexDate(Request $request)
    {
        $displayDate = Carbon::now();

        $users = DB::table('attendance_view_table')
            ->whereDate('date', $displayDate)
            ->paginate(5);

        return view('attendance_date', compact('users', 'displayDate'));
    }

    // 日別一覧
    public function perDate(Request $request)
    {
        $displayDate = Carbon::parse($request->input('displayDate'));

        if ($request->has('prevDate')) {
            $displayDate->subDay();
        }

        if ($request->has('nextDate')) {
            $displayDate->addDay();
        }

        $users = DB::table('attendance_view_table')
            ->whereDate('date', $displayDate)
            ->paginate(5);

        return view('attendance_date', compact('users', 'displayDate'));
    }

}