<!DOCTYPE html>
<html>
<head>
    <title>Календарь</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .current-month {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Календарь</h1>

<div class="calendar-container">
    <a href="{{ route('calendar', ['year' => $prevMonth->year, 'month' => $prevMonth->month]) }}">
        &lt;&lt; {{ $prevMonth->format('F Y') }}
    </a>
    <h2>{{ $date->format('F Y') }}</h2>
    <a href="{{ route('calendar', ['year' => $nextMonth->year, 'month' => $nextMonth->month]) }}">
        {{ $nextMonth->format('F Y') }} &gt;&gt;
    </a>

    <table>
        <thead>
            <tr>
                @foreach ($daysOfWeek as $day)
                    <th>{{ $day }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($calendar as $week)
                <tr>
                    @foreach ($week as $day)
                        <td class="{{ $day ? 'current-month' : '' }}">{{ $day }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>