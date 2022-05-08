<div class="row justify-content-start mb-5 pb-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header text-center">
                <h5> {{__('Store Review')}} </h5>
            </div>
            <div class="card-body row">
                <div class=" col-md-10">
                    <div class="row row-cols-1 row-cols-md-5 text-center">
                        @foreach($checklists as $checklist)
                        <div class="col mb-sm-2 mb-0">
                            <strong class="text-medium-emphasis">{{$checklist->name}}</strong>
                            <div class="fw-semibold">{{$checklist->user_tasks_count}} / {{$checklist->tasks_count}}</div>
                            <div class="progress progress-thin mt-2">
                                <div class="progress-bar bg-success-gradient" role="progressbar"
                                     style="width: {{$checklist->user_tasks_count/$checklist->tasks_count *100}}%"
                                     aria-valuenow="{{$checklist->user_tasks_count/$checklist->tasks_count *100}}"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class=" col-md-2">
                    <div class="col mb-sm-2 mb-0">
                        <h5 >{{$checklists->sum('user_tasks_count')}} /{{$checklists->sum('tasks_count')}}  </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
