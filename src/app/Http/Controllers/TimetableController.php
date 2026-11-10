<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
public function index()
{
$mondaycourses = DB::select("-- 区画1：月曜日の授業（時限の早い順）
SELECT period, name, teacher, room FROM courses
WHERE day = 1
ORDER BY period
");

$requiredcourses = DB::select("-- 区画2：必修科目（科目コードの順）
SELECT name, credits FROM courses
WHERE required = true
ORDER BY code");


$thirdpluscourses = DB::select("-- 区画3：3限以降の2単位の授業（曜日→時限の順）
SELECT day, period, name FROM courses
WHERE period >= 3
AND credits = 2
ORDER BY day, period;
");

$seminarcourses = DB::select("-- 区画4：演習の授業（科目コードの順）
SELECT name, teacher, room FROM courses
WHERE name LIKE '%演習'
ORDER BY code");

$jbuildingcourses = DB::select("-- 区画5：J棟の授業（金曜以外。曜日→時限の順）
SELECT day, period, name, room  FROM courses
WHERE room LIKE 'J%'
AND day <= 4
ORDER BY day, period;
");


$unassignedcourses = DB::select("-- 区画6：担当教員が未定の授業（科目コードの順）
SELECT code, name FROM courses
WHERE teacher IS NULL
ORDER BY code");


return view('timetable' , [
    'mondayCourses' => $mondaycourses,
    'requiredCourses' => $requiredcourses,
    'thirdPlusCourses' => $thirdpluscourses,
    'seminarCourses' => $seminarcourses,
    'jBuildingCourses' => $jbuildingcourses,
    'unassignedCourses' => $unassignedcourses
    ]);
}  


public function show($id)
{
    // データベースから時間割の詳細を取得する処理
    $timetable = Timetable::find($id);

    if (!$timetable) {
        abort(404);
    }

    return view('timetable.show', ['timetable' => $timetable]);
}
}
