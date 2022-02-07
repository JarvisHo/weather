<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Record;
use App\Models\User;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * @var Carbon
     */
    private $now;

    public function __construct()
    {
        $this->now = Carbon::now();
    }

    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('總體概況')
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $count = User::whereRaw('YEAR(created_at) = ?',[$this->now->year])
                        ->whereRaw('MONTH(created_at) = ?',[$this->now->month])
                        ->count();

                    $total = User::count();

                    $column->append(view('admin.dashboard.dash', ['title' => '本月註冊用戶 / 總人數', 'body' => "$count 人 / $total 人"]));
                });

                $row->column(4, function (Column $column) {
                    $count = Record::whereRaw('YEAR(created_at) = ?',[$this->now->year])
                        ->whereRaw('MONTH(created_at) = ?',[$this->now->month])
                        ->count();

                    $total = Record::count();

                    $column->append(view('admin.dashboard.dash', ['title' => '本月紀錄量 / 總紀錄量', 'body' => "$count 則 / $total 則"]));
                });

                $row->column(4, function (Column $column) {

                    $count = Coupon::whereRaw('YEAR(created_at) = ?',[$this->now->year])
                        ->whereRaw('MONTH(created_at) = ?',[$this->now->month])
                        ->count();

                    $total = Record::count();

                    $column->append(view('admin.dashboard.dash', ['title' => '本月折價券發行量 / 總發行量', 'body' => "$count 則 / $total 則"]));
                });
            })
            ->row(function (Row $row) {
                $row->column(6, function (Column $column) {
                    $users = User::where('created_at', '>', date('Y-m-d', strtotime('last week')))->orderBy('id', 'desc')->limit(10)->get();
                    $column->append(view('admin.dashboard.users', [ 'title' => '本週新用戶', 'users' => $users ]));
                });

                $row->column(6, function (Column $column) {
                    $records = Record::where('created_at', '>', date('Y-m-d', strtotime('last week')))->orderBy('id', 'desc')->limit(10)->get();
                    $column->append(view('admin.dashboard.records', [ 'title' => '本週新紀錄', 'records' => $records ]));
                });
            });
    }
}
