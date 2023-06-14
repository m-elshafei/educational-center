   <ul class="navbar-nav me-auto">
       <li class="nav-item">
           <a class="nav-link" href="{{ url('/') }}">{{ __('message.companies') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('branch') }}">{{ __('message.branches') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('manager') }}">{{ __('message.managers') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('vendor') }}">{{ __('message.vendors') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('category') }}">{{ __('message.categories') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('classroom') }}">{{ __('message.class_rooms') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('course') }}">{{ __('message.courses') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('course_student') }}">{{ __('message.course_students') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('employee') }}">{{ __('message.employees') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('schedule') }}">{{ __('message.schedules') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('users') }}">{{ __('message.users') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('roles') }}">{{ __('message.permissions') }}</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ url('contact') }}">{{ __('message.contact_us') }}</a>
       </li>
@if (session('locale') == 'ar')
    
       <img src="{{ Avatar::create(Auth::user()->name_ar)->toBase64() }}" alt="profile image" class="avatar-img ">
@else
       <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="profile image" class="avatar-img ">
@endif
   </ul>
