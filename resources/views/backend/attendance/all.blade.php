@extends('layouts.backend.app')

@section('main')

    @component('layouts.backend.partials.header')
    @endcomponent

    @component('layouts.backend.partials.main.nav-bar')
    @endcomponent

    @component('layouts.backend.partials.main.hero', ['titleMain' => "Attendandance Management", 'titleSub' => 'Manage your exams attendance'])
    @endcomponent

    @component('components.backend.attendance.all', ['attendances' => $attendances])
    @endcomponent

    @component('layouts.backend.partials.footer')
    @endcomponent

@endsection
