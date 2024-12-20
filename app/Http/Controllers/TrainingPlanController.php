<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DateTime;
use Carbon\Carbon;

class TrainingPlanController extends Controller
{
    public function create()
    {
        return view('training_plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'intensity' => ['required', Rule::in(['low', 'medium', 'high'])],
            'duration' => ['required', Rule::in(['week', 'two_weeks', 'month'])],
        ]);

        $planLength = match ($request->input('duration')) {
            'week' => 7,
            'two_weeks' => 14,
            'month' => 30,
            default => 7,
        };

        $planDetails = $this->generateTrainingPlan(
            $request->input('intensity'),
            $planLength
        );

        DB::table('training_plans')->insert([
            'user_id' => Auth::id(),
            'intensity' => $request->input('intensity'),
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'plan_details' => json_encode($planDetails),
            'created_at' => now(),
        ]);

        return redirect('/loading/file');
    }

    private function generateTrainingPlan(string $intensity, int $planLength): array
    {
        $startDate = Carbon::now();
        $plan = [];
        for ($i = 0; $i < $planLength; $i++) {
            $date = $startDate->copy()->addDays($i);
            $dayName = $date->format('l');
            $exercises = $this->generateDailyExercises($intensity, $dayName, $date);
            $plan[] = ['date' => $date->toDateString(), 'day' => $dayName, 'exercises' => $exercises];
        }
        return $plan;
    }

    private function generateDailyExercises(string $intensity, string $dayName, Carbon $date): array
    {
        $exercises = [];
        $baseExercises = [
            'low' => ['Бег трусцой', 'Растяжка'],
            'medium' => ['Бег трусцой', 'Интервальный бег', 'Растяжка'],
            'high' => ['Интервальный бег', 'Бег с ускорениями', 'Растяжка'],
        ];
        $durations = [
            'low' => [30, 15],
            'medium' => [45, 30, 10],
            'high' => [60, 45, 15],
        ];

        if ($intensity !== 'low' && $date->isWeekend()) {
            $exercises[] = "Отдых!";
        } elseif ($intensity !== 'low' && $dayName === 'Sunday') {
            $exercises[] = "Легкая прогулка (30 мин)";
        } else {
            $numExercises = rand(0, count($baseExercises[$intensity]) - 1);
            $duration = $durations[$intensity][$numExercises] + rand(-5, 5);
            $duration = max(5, $duration);
            $exercises[] = $baseExercises[$intensity][$numExercises] . ' (' . $duration . ' мин)';
        }
        return $exercises;
    }


    public function show()
    {
        $userId = Auth::id();
        $latestPlan = DB::table('training_plans')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();
        $plan  = DB::table('training_plans')
            ->where('user_id', $userId)
            ->first();


        if (!$latestPlan) {
            return view('training_plans.show', ['error' => 'План тренировок не найден.']);
        }

        $planDetails = json_decode($latestPlan->plan_details, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return view('training_plans.show', ['error' => 'Ошибка при загрузке плана тренировок.']);
        }

        Carbon::setLocale('ru');
        $daysOfWeekRu = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

        $validPlanDetails = array_filter($planDetails, function ($item) {
            return isset($item['date']) && is_string($item['date']);
        });

        if(empty($validPlanDetails)){
            return view('training_plans.show', ['error' => 'В плане тренировок некорректные данные.']);
        }

        $sortedPlanDetails = collect($validPlanDetails)->sortBy('date')->toArray();

        $calendar = [];
        foreach ($sortedPlanDetails as $item) {
            try {
                $date = Carbon::parse($item['date']);
                $dayOfWeek = $daysOfWeekRu[$date->dayOfWeek == 0 ? 6 : $date->dayOfWeek - 1];
                $formattedDate = $date->format('d.m.Y');

                foreach ($item['exercises'] as $exercise) {
                    $calendar[] = [
                        'date' => $formattedDate,
                        'dayOfWeek' => $dayOfWeek,
                        'exercise' => $exercise,
                    ];
                }
            } catch (\Exception $e) {
                \Log::error("Ошибка при обработке элемента: " . json_encode($item) . " - " . $e->getMessage());
            }
        }
        return view('training_plans.show', compact('calendar', 'daysOfWeekRu', 'plan'));


    }



}