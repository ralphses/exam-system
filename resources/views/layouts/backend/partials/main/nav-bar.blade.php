<div class="bg-primary-darker">
    <div class="bg-black-10">
        <div class="content py-3">
            <!-- Toggle Main Navigation -->
            <div class="d-lg-none">
                <!-- Class Toggle, functionality initialized in Helpers.oneToggleClass() -->
                <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- END Toggle Main Navigation -->

            <!-- Main Navigation -->
            <div id="main-navigation" class="d-none d-lg-block mt-2 mt-lg-0">
                <ul class="nav-main nav-main-dark nav-main-horizontal nav-main-hover">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="/">
                            <i class="nav-main-link-icon si si-compass"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link active nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                            <i class="nav-main-link-icon si si-puzzle"></i>
                            <span class="nav-main-link-name">Services</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('staff.all') }}">
                                    <span class="nav-main-link-name">Staffs</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('students.all') }}">
                                    <span class="nav-main-link-name">Students</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('course.all') }}">
                                    <span class="nav-main-link-name">Courses</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('exam.all') }}">
                                    <span class="nav-main-link-name">Exams</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('attendance.all') }}">
                                    <span class="nav-main-link-name">Attendance</span>
                                </a>
                            </li>


                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">More Options</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="javascript:void(0)">
                                            <span class="nav-main-link-name">Another Link</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>

                   <form action="{{ route('logout') }}" method="POST">
                       @csrf
                       <li class="nav-main-item">
                           <button type="submit" style="background-color: transparent; border-color: transparent" class="nav-main-link">
                               <i class="nav-main-link-icon si si-action-undo"></i>
                               <span class="nav-main-link-name">Logout</span>
                           </button>
                       </li>
                   </form>

                </ul>
            </div>
            <!-- END Main Navigation -->
        </div>
    </div>
</div>
