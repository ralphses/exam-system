@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Exam Management", 'titleSub' => 'View all examinations'])
    @endcomponent

    @component('components.backend.exams.all', ['exams' => $exams])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
