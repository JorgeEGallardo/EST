<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;
use App\worker;
use App\sale;
use Dotenv\Regex\Result;

class get extends Controller
{
    public function getSalesByWeek()
    {
        $date = date("Y-m-d");
        $data = array();
        for ($i = 1; $i <= 7; $i++) {
            $day = $i;
            $dayofweek = date('w', strtotime($date));
            $in = date('Y-m-d', strtotime(($day - $dayofweek) . ' day', strtotime($date)));
            $end = date('Y-m-d', strtotime(($day + 1 - $dayofweek) . ' day', strtotime($date)));
            $result = \DB::select('select count(id) as idxd from sales where created_at > ? and created_at < ?', [$in, $end]);
            array_push($data, $result[0]->idxd);
        }
        return $data;
    }
    public function getTotals()
    {
        $totals = array();
        $ini = date('Y-m-01');
        $end = date('Y-m-t');
        $end = date('Y-m-d', strtotime($end . ' + 1 days'));

        $month = \DB::select("select coalesce(SUM(t.price), 0) as total from sales s join types t where s.type_id = t.id and s.created_at >= '$ini' and s.created_at< '$end'");

        $ini = date('Y-m-d');
        $end = date('Y-m-d', strtotime($ini . ' + 1 days'));

        $day = \DB::select("select coalesce(SUM(t.price), 0) as total from sales s join types t where s.type_id = t.id and s.created_at >= '$ini' and s.created_at< '$end'");

        $ini = date('Y-01-01');
        $end = date('Y-12-31', strtotime($ini . ' + 1 days'));
        $end = date('Y-m-d', strtotime($end . ' + 1 days'));
        $year = \DB::select("select coalesce(SUM(t.price), 0) as total from sales s join types t where s.type_id = t.id and s.created_at >= '$ini' and s.created_at< '$end'");
        $date = date("Y-m-d");
        $dayofweek = date('w', strtotime($date));
        $in = date('Y-m-d', strtotime((1 - $dayofweek) . ' day', strtotime($date)));
        $end = date('Y-m-d', strtotime((7 - $dayofweek) . ' day', strtotime($date)));
        $week = \DB::select("select coalesce(SUM(t.price), 0) as total from sales s join types t where s.type_id = t.id and s.created_at >= '$ini' and s.created_at< '$end'");


        array_push($totals, $day[0]->total);
        array_push($totals, $week[0]->total);
        array_push($totals, $month[0]->total);
        array_push($totals, $year[0]->total);
        return $totals;
    }
    public function getSalesByWeekPeriod()
    {
        $date = date("Y-m-d");
        $counts = array();
        $dayofweek = date('w', strtotime($date));
        $ini = date('Y-m-d', strtotime((1 - $dayofweek) . ' day', strtotime($date)));
        $end = date('Y-m-d', strtotime((7 - $dayofweek) . ' day', strtotime($date)));
        $result = \DB::select("select coalesce(SUM(t.price), 0) as total from sales s join types t where s.type_id = t.id and s.created_at >= '$ini' and s.created_at< '$end'");

         foreach ($result as $re) {
            array_push($counts, $re->total);
        }
        return $counts;
    }
    public function getSalesByWorkerWeek()
    {
        $date = date("Y-m-d");
        $data = array();
        $counts = array();
        $workers = array();
        $dayofweek = date('w', strtotime($date));
        $in = date('Y-m-d', strtotime((1 - $dayofweek) . ' day', strtotime($date)));
        $end = date('Y-m-d', strtotime((7 - $dayofweek) . ' day', strtotime($date)));
        $result = \DB::select("select count(s.id) as count, w.username from sales s join workers w where s.created_at >'$in' and s.created_at < '$end' and w.id = s.worker_id GROUP BY w.username;");
        foreach ($result as $re) {
            array_push($counts, $re->count);
            array_push($workers, $re->username);
        }
        array_push($data, $workers);
        array_push($data, $counts);
        return $data;
    }

    public function getSalesByMonth()
    {
        $date = date("Y");
        $data = array();
        $start    = (new \DateTime($date . '-01-01'))->modify('first day of this month');
        $end      = (new \DateTime($date . '-12-31'))->modify('first day of next month');
        $interval = \DateInterval::createFromDateString('1 month');
        $period   = new \DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {
            $in =  $dt->format("Y-m-01") . "<br>\n";
            $end = $dt->format("Y-m-t") . "<br>\n";
            $result = \DB::select('select count(id) as idxd from sales where created_at > ? and created_at < ?', [$in, $end]);
            array_push($data, $result[0]->idxd);
        }
        return $data;
    }
    public function getSalesByType(){
        $ini = date('Y-01-01' , strtotime(date('Y-m-d') . ' - 30 days'));
        $count = array();
        $name = array();
        $data = array();
        $result =   \DB::select("select COUNT(t.id) as count, t.name
        from sales s
        join types t
        where s.type_id = t.id and s.created_at > '$ini' GROUP by t.name ");

        foreach ($result as $re) {
            array_push($name, $re->name);
            array_push($count, $re->count);
        }
        array_push($data, $name);
        array_push($data, $count);
        return $data;
        //Devuelve una cadena de valores con nombres y la cantidad de cortes falta separarlos en dos arrays
        //devolverlos y meterlos a variables para despues ponerlos en graficas
    }
    public function getPeakHour()
    {
        $hours = array();
        $count = array();
        $data = array();
        $result = \DB::select('select extract(hour from created_at) as hr,
        count(*) as count
        from sales
        group by extract(hour from created_at)
        order by count(*)  desc
        limit 24');
        foreach ($result as $re) {
            array_push($hours, $re->hr.":00");
            array_push($count, $re->count);
        }
        array_push($data, $hours);
        array_push($data, $count);
        return $data;
    }
    public function getTypes()
    {
        $type = type::all();
        return view('welcome')->with(compact('type'));
    }
    public function getUser($id)
    {
        $worker = worker::all();
        return view('user', ['id' => $id])->with(compact('worker'));
    }
    public function getData()
    {
        $data = \DB::select("select s.created_at, u.name as Vendedor, t.name from sales s join workers u join types t where u.id = s.worker_id and t.id = s.type_id");
        return $data;
    }
    public function getTables()
    {
        $worker = worker::all();
        return view('table')->with(compact('worker'));
    }
    public function getDashboard()
    {
        $sales = get::getSalesByWeek();//Ventas semanales
        $month = get::getSalesByMonth();//Ventas mensuales
        $worker = get::getSalesByWorkerWeek();//Ventas semanales por trabajador
        $peak = get::getPeakHour();//Pico de ventas por hora
        $periodicSale = get::getSalesByType();//Ventas por tipo en los últimos 30 días
        $salesworkers = $worker[0];
        $salescounts = $worker[1];
        $hours = $peak[0];
        $counts = $peak[1];
        $periodName = $periodicSale[0];
        $periodCount = $periodicSale[1];
        $totals = get::getTotals();
        $moneyByWeek =get::getSalesByWeekPeriod();
        return view('dash')->with(compact('sales'))
        ->with(compact('month'))
        ->with(compact('salesworkers'))
        ->with(compact('salescounts'))
        ->with(compact('hours'))
        ->with(compact('counts'))
        ->with(compact('totals'))
        ->with(compact('periodName'))
        ->with(compact('moneyByWeek'))
        ->with(compact('periodCount'));
    }
    public function getTypesC()
    {
        $worker = worker::all();
        $sales = sale::all();
        $types = type::all();
        return view('types')->with(compact('types'));
    }
    public function getSales()
    {
        $sales =  \DB::select('select s.id, w.name as worker, t.name as sale, t.price , s.created_at from sales s join types t join workers w where s.worker_id = w.id and s.type_id = t.id');
        return view('sales')->with(compact('sales'));
    }
}
