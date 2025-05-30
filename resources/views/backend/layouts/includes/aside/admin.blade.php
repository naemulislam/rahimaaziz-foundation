@php
    $routeName = request()->route()->getName();
@endphp
<li class="menu-item {{ $routeName == 'admin.dashboard' ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path
                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                        fill="#000000" fill-rule="nonzero" />
                    <path
                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Dashboard</span>
    </a>
</li>
<li class="menu-section">
    <h4 class="menu-text">Custom</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>

<!--Category-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.group.index' ? 'menu-item-open' : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Academic</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Academic</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.group.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.group.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Group</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End blog-->
<!--student management-->
<li class="menu-item menu-item-submenu
    {{ $routeName == 'admin.register.index' ||
    $routeName == 'admin.daily_activity.index' ||
    $routeName == 'admin.registerAdmission.create' ||
    $routeName == 'admin.admission.index' ||
    $routeName == 'admin.admission.create' ||
    $routeName == 'admin.admission.show' ||
    $routeName == 'admin.admission.pending' ||
    $routeName == 'admin.students.promotion' ||
    $routeName == 'admin.admission.edit'
        ? 'menu-item-open'
        : '' }}
    "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Student Management</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Student</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.register.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.register.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    @php
                        $register = \App\Models\Student::where('admission_status', false)
                            ->where('status_type', false)
                            ->where('status', false)
                            ->count();
                    @endphp
                    <span class="menu-text">Registration<span class=" ml-3 text-white text-center"
                            style="background-color:#740000; height:20px; width:20px; border-radius:50%">{{ $register }}</span></span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.admission.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.admission.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Admission List</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.admission.create' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.admission.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Admission Create</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.admission.pending' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.admission.pending') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    @php
                        $onlineRequest = \App\Models\Student::where('admission_status', false)
                            ->where('status_type', false)
                            ->where('status', true)
                            ->count();
                    @endphp
                    <span class="menu-text">Admission Request <span class=" ml-3 text-white text-center"
                            style="background-color:#740000; height:20px; width:20px; border-radius:50%">{{ $onlineRequest }}</span></span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.students.promotion' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.students.promotion') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Student Promotion</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.daily_activity.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.daily_activity.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Daily Activity</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End student management-->
<!--teacher management-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.teacher.index' ||
                                $routeName == 'admin.teacher.create' ||
                                $routeName == 'admin.teacher.edit' ||
                                $routeName == 'admin.teacher.show'
                                    ? 'menu-item-open'
                                    : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Teacher Management</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Teacher</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.teacher.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.teacher.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Teacher List</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>

            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.teacher.create' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.teacher.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Teacher Create</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End teacher management-->
<!-- Teacher Attendance-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.teacher.atten.index' ||
                                $routeName == 'admin.teacher.atten.create' ||
                                $routeName == 'admin.teacher.atten.show'
                                    ? 'menu-item-open'
                                    : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Teacher Attendance</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Attendance</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.teacher.atten.create' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.teacher.atten.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Attendance Create</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>

            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.teacher.atten.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.teacher.atten.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Attendance List</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
            {{-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Export Attendance</span>
													<i class="menu-arrow"></i>
												</a>

											</li> --}}
        </ul>
    </div>
</li>
<!--End Teacher Attendance-->
<!--Student Attendance-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.student.atten.index' ||
                                $routeName == 'admin.student.atten.create' ||
                                $routeName == 'admin.student.atten.show'
                                    ? 'menu-item-open'
                                    : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Student Attendance</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Attendance</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.student.atten.create' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.student.atten.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Attendance</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.student.atten.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.student.atten.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Attendance List</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End Student Attendance-->
<!--Start fees collection-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.fees.index' ||
                                $routeName == 'admin.fees.create' ||
                                $routeName == 'admin.fees.show' ||
                                $routeName == 'admin.fees.partial.edit'
                                    ? 'menu-item-open'
                                    : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Fees Collection</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">fees</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.fees.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.fees.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Student Fees</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.fees.create' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.fees.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text"> Fees Create</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End Admission-->
<!--Satart Improve teacher Class-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.teacher.promotion' ? 'menu-item-open' : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Teacher Promotions</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">promotion</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.teacher.promotion' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.teacher.promotion') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">All Teacher</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
<!--End Improve teacher Class-->
<!--Satart Teacher Responsibility-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.respons.index' ||
                                $routeName == 'admin.respons.create' ||
                                $routeName == 'admin.respons.edit'
                                    ? 'menu-item-open'
                                    : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Teahcer Responsibility</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">respons</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.respons.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.respons.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Responsibility list</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.respons.create' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.respons.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Responsibility create</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End Teacher Responsibility-->
<!--Student Activity-->
<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Student Activity</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Student Activity</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.activity.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Create Activity</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.activity.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Activity List</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.average.activity') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Average Activity</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
<!--End student activity-->
<!--Massage-->
<li class="menu-item menu-item-submenu
 {{ $routeName == 'admin.message.index' ||
    $routeName == 'admin.message.show'? 'menu-item-open': '' }}
" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        @php
            $getCountmsg = \App\Models\Contact::where('status', false)->count();
        @endphp
        <span class="menu-text">Massage<span class=" ml-3 text-white text-center"
                style="background-color:#740000; height:20px; width:20px; border-radius:50%">{{ $getCountmsg }}</span></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Massage</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.message.index' || $routeName == 'admin.message.show' ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.message.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Message inbox</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
<!--End Massage-->
<!--WebSite management Setting-->
<li class="menu-item menu-item-submenu
    {{ $routeName == 'admin.notice.index' ||
    $routeName == 'admin.notice.create' ||
    $routeName == 'admin.notice.edit' ||
    $routeName == 'admin.program.index' ||
    $routeName == 'admin.program.create' ||
    $routeName == 'admin.program.edit' ||
    $routeName == 'admin.campuses.index' ||
    $routeName == 'admin.gallery.index' ||
    $routeName == 'admin.slider.index' ||
    $routeName == 'admin.about.index' ||
    $routeName == 'admin.achievement.index' ||
    $routeName == 'admin.achievement.create' ||
    $routeName == 'admin.achievement.edit' ||
    $routeName == 'admin.news.index' ||
    $routeName == 'admin.news.create' ||
    $routeName == 'admin.news.edit'
        ? 'menu-item-open'
        : '' }}
    "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Website Mangement</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">website</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.slider.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.slider.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Slider</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.about.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.about.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">About Us</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.notice.index' ||
            $routeName == 'admin.notice.create' ||
            $routeName == 'admin.notice.edit'
                ? 'menu-item-active'
                : '' }}
                                            "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.notice.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Notices</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.program.index' ||
                                            $routeName == 'admin.program.create' ||
                                            $routeName == 'admin.program.edit'
                                                ? 'menu-item-active'
                                                : '' }}
                                            "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.program.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Programs</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.campuses.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.campuses.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Campuses</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.achievement.index' ||
                                            $routeName == 'admin.achievement.create' ||
                                            $routeName == 'admin.achievement.edit'
                                                ? 'menu-item-active'
                                                : '' }}
                                            "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.achievement.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Achievement</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.news.index' || $routeName == 'admin.news.create' || $routeName == 'admin.news.edit'
                                                ? 'menu-item-active'
                                                : '' }}
                                            "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.news.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Latest News</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>

            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.gallery.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Galleries</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
<!--End WebSite management Setting-->
<!--masjid section-->
<li class="menu-item menu-item-submenu
                                {{ $routeName == 'admin.masjid.slider.index' ||
                                $routeName == 'admin.masjid.about.index' ||
                                $routeName == 'admin.prayer.index' ||
                                $routeName == 'admin.service.index' ||
                                $routeName == 'admin.service.create' ||
                                $routeName == 'admin.service.edit' ||
                                $routeName == 'admin.masjid.gallery.index'
                                    ? 'menu-item-open'
                                    : '' }}
                                "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Masjid Management</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Site masjid</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.masjid.slider.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.masjid.slider.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Slider</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.masjid.about.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.masjid.about.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">About Us</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.prayer.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.prayer.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Prayer</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu
                                            {{ $routeName == 'admin.service.index' ||
                                            $routeName == 'admin.service.create' ||
                                            $routeName == 'admin.service.edit'
                                                ? 'menu-item-active'
                                                : '' }}
                                            "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.service.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Service</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ $routeName == 'admin.masjid.gallery.index' ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.masjid.gallery.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Gallery</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
<!--End masjid-->
<!--Site Setting-->
<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Setting</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Site Setting</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.setting.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">General Setting</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End Setting-->
<!--Parent-->
<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Parents</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">parent</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.parent.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">All Parent</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.parent.create') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Parent Register</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
<!--End parent-->
<!--End blog-->
<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path
                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                        fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">File manager</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Site Setting</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.filemanager.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">file manager</span>
                    <i class="menu-arrow"></i>
                </a>

            </li>
        </ul>
    </div>
</li>
<!--End blog-->
