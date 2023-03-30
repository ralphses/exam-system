<div class="content">
    <!-- Overview -->
    <div class="row items-push">

        @can('isInvigilator', \App\Models\User::class)
        <div class="col-sm-6 col-xxl-3">
            <!-- Pending Orders -->
            <div class="bg-body-light rounded-bottom block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold justify-center text-center">
                            <a class="text-center" href="{{ route('attendance.authenticate') }}">TAKE ATTENDANCE NOW</a>
                        </dt>
                    </dl>
                </div>
                
            </div>
            <!-- END Pending Orders -->
        </div>

        <div class="col-sm-6 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ $info['attendance']->count() }}</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Attendances</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{ route('attendance.all') }}">
                        <span>View All Attendances</span>
                        <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>

        @endcan
      
       
      @can('isAdmin', \App\Models\User::class)
      <div class="col-sm-6 col-xxl-3">
        <!-- New Customers -->
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $info['exams']->count() }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Exminations</dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                    <i class="far fa-user-circle fs-3 text-primary"></i>
                </div>
            </div>
            <div class="bg-body-light rounded-bottom">
                <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{ route('exam.all') }}">
                    <span>View all Examinations</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
            </div>
        </div>
        <!-- END New Customers -->
    </div>
    <div class="col-sm-6 col-xxl-3">
        <!-- Messages -->
        <div class="block block-rounded d-flex flex-column h-100 mb-0">
            <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                    <dt class="fs-3 fw-bold">{{ $info['students']->count() }}</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Students</dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                    <i class="far fa-paper-plane fs-3 text-primary"></i>
                </div>
            </div>
            <div class="bg-body-light rounded-bottom">
                <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{ route('students.all') }}">
                    <span>View all Students</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
            </div>
        </div>
        <!-- END Messages -->
    </div>
      @endcan
    </div>
    <!-- END Overview -->
</div>
