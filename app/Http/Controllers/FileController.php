<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DateTime;
use Carbon\Carbon;
 

class FileController extends Controller
{

  public function index(Request $request)
    {
      if (Auth::check()) {
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        // Создаем объект Carbon для текущего месяца
        $date = Carbon::create($year, $month, 1);

        // Получаем предыдущий и следующий месяцы
        $prevMonth = $date->copy()->subMonth();
        $nextMonth = $date->copy()->addMonth();

        // Получаем дни недели
        $daysOfWeek = ['Mon', 'Tue', 'Wen', 'Thu', 'Fri', 'Sat', 'Sun'];

        // Получаем количество дней в месяце
        $daysInMonth = $date->daysInMonth;

        // Получаем первый день месяца
        $firstDayOfMonth = $date->copy()->startOfMonth()->dayOfWeek;
        $firstDayOfMonth-=1;

        // Создаем массив дней для календаря
        $calendar = [];
        $day = 1;

        // Заполняем массив дней
        for ($week = 0; $week < 6; $week++) {
            for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
                if ($week == 0 && $dayOfWeek < $firstDayOfMonth) {
                    $calendar[$week][$dayOfWeek] = '';
                } else if ($day > $daysInMonth) {
                    break 2;
                } else {
                    $calendar[$week][$dayOfWeek] = $day;
                    $day++;
                }
            }
        }
        $trainings=DB::table('trainings')
                    ->where('users_id',Auth::user()->id)
                    ->get();
        
        return view('file', compact('calendar', 'year', 'month', 'daysOfWeek', 'prevMonth', 'nextMonth','date','trainings'));
      }
      else {
        return view('entrance');
      }
    }




    public function import(Request $request)
    {
      // Получение данных из файла
      $file = $request->file('file');
      $contents = $file->getContent();
      $data = json_decode($contents, true);
    
      // Обработка данных
      $date = $data['date'];
      $distance = $data['distance'];
      $seconds = count($data['records']);
      $duration = $seconds;
      $pulses = collect($data['records'])->pluck('pulse')->toArray();
      $temps = collect($data['records'])->pluck('temp')->toArray();
      $average_pulse = array_sum($pulses) / $seconds;
      $average_temp = array_sum($temps) / $seconds;
    
      // Сохранение данных в таблицу
      $trainingId = DB::table('trainings')->insertGetId([
        'users_id' => 1,  
        'date' => $date,
        'distance' => $distance,
        'comment' => null, // Добавьте, если нужно
        'duration' => $duration,
        'average_pules' => $average_pulse,
        'average_temp' => $average_temp,
        'created_at' => now(),
      ]);
    
      // Подсчет базовых и интенсивных этапов
      $baseDuration = 0;
      $intensiveDuration = 0;
    
      $pulseZone = DB::table('pulse_zones')
        ->where('users_id', Auth::user()->id)
        ->first(); // Используйте first() для получения одного объекта

      if ($pulseZone) {
        $z3Value = $pulseZone->Z3; 
      }

      $i = 0;
      while ($i < $seconds) {
        // Проверка на "базовый" или "интенсивный" этап (логика зависит от ваших критериев)
        if ($pulses[$i] < $z3Value) {
          $baseDuration++;
        } else {
          $intensiveDuration++;
        }
        $i++;
      }
    
      // Сохранение данных в таблицы этапов
      DB::table('bases')->insert([
        [
          'trainings_id' => $trainingId, 
          'type' => 'базовый', // Можете использовать enum, если у вас есть типы этапов
          'duration' => $baseDuration,
          'distance' => null, // Добавьте, если нужно
          'created_at' => now(),
        ]
      ]);
    
      DB::table('intensives')->insert([
        [
          'trainings_id' => $trainingId,
          'type' => 'интенсивный', // Можете использовать enum, если у вас есть типы этапов
          'duration' => $intensiveDuration,
          'distance' => null, // Добавьте, если нужно
          'created_at' => now(),
        ]
      ]);
    
      return redirect('/');
    }

}
