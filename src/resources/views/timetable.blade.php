<h2>月曜日の授業</h2>

@foreach ($mondayCourses as $course)
    <p>
        {{ $course->period }}限：
        {{ $course->name }}
        {{ $course->teacher }}
        {{ $course->room }}
    </p>
@endforeach

<h2>必修科目</h2>

@foreach ($requiredCourses as $course)
    <p>
        {{ $course->name }}：
        {{ $course->credits }}単位
    </p>
@endforeach


<h2>3限以降の2単位の授業</h2>

@foreach ($thirdPlusCourses as $course)
    <p>
        {{ $course->day }}曜日
        {{ $course->period }}限：
        {{ $course->name }}
    </p>
@endforeach

<h2>演習の授業</h2>

@foreach ($seminarCourses as $course)
    <p>
        {{ $course->name }}:
        {{ $course->teacher }}
        {{ $course->room }}
    </p>
@endforeach

<h2>J棟の授業</h2>

@foreach ($jBuildingCourses as $course)
    <p>
        {{ $course->day }}曜日 
        {{ $course->period }}限
        {{ $course->name }}
        {{ $course->room }}
    </p>
@endforeach

<h2>担当教員が未定の授業</h2>

@foreach ($unassignedCourses as $course)
    <p>
        {{ $course->code }}：
        {{ $course->name }}
    </p>
@endforeach


