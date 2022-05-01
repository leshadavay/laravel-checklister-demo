
<script>
    function checklistGroupEdit(url){
        window.location = url;
    }
</script>



<div class="sidebar sidebar-dark sidebar-fixed sidebar-self-hiding-xl" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a href="{{route('welcome')}}" class="badge btn btn-sm btn-danger">{{auth()->user()->name}}</a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">


        <li class="nav-item"><a class="nav-link" href="index.html">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg> {{__('Dashboard')}} </a>
        </li>

        @if(auth()->user()->is_admin)

            <li class="nav-title">{{__('Manage Checklist')}}</li>
            <li class="nav-group" aria-expanded="false">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-description')}}"></use>
                    </svg>
                {{__('Checklist Groups')}}
                </a>
                <ul class="nav-group-items" style="height: auto;">

                @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group )

                        <li class="nav-group" aria-expanded="false" >

                            <span class="position-absolute d-flex align-items-center " style="cursor: pointer; right: 30%; width: 30px; top: 13px"
                                  onclick="checklistGroupEdit(`{{route('admin.checklist_groups.edit',$group->id)}}`)">
                                <svg class="nav-icon">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>
                                </svg>
                            </span>
                            <a class="nav-link nav-group-toggle" >
                                {{__($group->name)}}
                            </a>

                            <ul class="nav-group-items" style="height: auto;">
                            @foreach($group->checklists as $checklist)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.checklist_groups.checklists.edit',[$group, $checklist])}}">
                                        <span class="nav-icon"></span>  {{__($checklist->name)}}
                                    </a>
                                </li>
                            @endforeach
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.checklist_groups.checklists.create',$group)}}">
                                        <span class="nav-icon"></span>  {{__("New checklist")}}
                                    </a>
                                </li>
                            </ul>

                        </li>

                @endforeach
                    <ul class="nav-group-items" style="height: auto;">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.checklist_groups.create') }}">
                                <span class="nav-icon"></span>  {{__('New checklist group')}}</a>
                        </li>
                    </ul>
                </ul>
            </li>

            <li class="nav-title">{{__('Pages')}}</li>

            @foreach(\App\Models\Page::all() as $page)
                <li class="nav-group">
                    <a class="nav-link" href="{{route('admin.pages.edit',$page)}}">
                        <svg class="nav-icon">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle')}}"></use>
                        </svg>
                        {{$page->title}}
                    </a>
                </li>
            @endforeach

            <li class="nav-title">{{__('Manage Users')}}</li>
            <li class="nav-group">
                <a class="nav-link" href="{{route('admin.users.index')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle')}}"></use>
                    </svg>
                    {{__('Users')}}
                </a>
            </li>
        @endif


        {{--<hr>
        <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                </svg>

                {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>--}}



    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>

