<div class="p-5">
    <div class="p-5 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">ALL ATTENDANCES</h3>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 15%;"">Title</th>
                        <th style="width: 30%;">Examination</th>
                        <th style="width: 25%;">Period</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($attendances->count() > 0)
                    
                        @foreach($attendances as $attendance)
                            <tr>
                                <td class="fw-semibold fs-sm">
                                    <a href="">{{ ++$loop->index }}</a>
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $attendance->examination->course->code . " ATTENDANCE" }}
                                </td>
                                <td class="fs-sm">{{ $attendance->examination->title }}</em></td>
                                <td>
                                    {{ $attendance->examination->start_time . " - " . $attendance->examination->stop_time }}
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>

                            <td class="fw-semibold text-center" colspan="5">
                                <h5>NO DATA FOUND</h5>
                            </td>

                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
