<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DateTime;
 

class FileController extends Controller
{
    public function show()
    {
    return view('file');
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
    
      $i = 0;
      while ($i < $seconds) {
        // Проверка на "базовый" или "интенсивный" этап (логика зависит от ваших критериев)
        if ($pulses[$i] < 130 && $temps[$i] < 6.5) {
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
