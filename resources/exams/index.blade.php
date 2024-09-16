// resources/views/exams/index.blade.php
@foreach ($exams as $exam)
    <tr>
        <td>{{ $exam->id }}</td>
        <td>{{ $exam->title }}</td>
        <td>
            @if ($exam->course)
                {{ $exam->course->name }}
            @else
                Cours non disponible
            @endif
        </td>
    </tr>
@endforeach
