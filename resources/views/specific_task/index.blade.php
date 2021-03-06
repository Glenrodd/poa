@extends('layouts.app')
@section('title')
    Tarea
@endsection
@section('breadcrums')
    {{-- {{ Breadcrumbs::render('operation_tasks',$operation) }} --}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-primary">
                   
                    <div class="row">
                        <div class="col-md-4">
                                <i class="material-icons" style="font-size:40px;">assignment</i>
                        </div>
                        <div class="col-md-8">
                            <!-- /.widget-user-image -->
                            <h3 >{{ $task->code}}</h3>
                            <h5 > <i class="material-icons">flag</i> {{ $task->meta}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <span> {{$task->description}}</span>
                    </div>                    
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
						@foreach ($task->programmings as $month)
							<li class="nav-item" >
								<a href="{{url('specific_task/'.$task->id.'/'.$month->pivot->id)}}" class="nav-link">
                                    @if($month->pivot->id==$programming->id)
                                        <i class="fa fa-folder-open text-primary"></i>
                                    @else
                                        <i class="fa fa-folder text-warning"></i>
                                    @endif
									{{$month->name}}  <span class="float-right badge bg-success"> <i class="fa fa-flag"></i> {{$month->pivot->meta}}</span>
								</a>
							</li>
						@endforeach
                       
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-calendar">
                            
                        <h3 class="card-title">
                            <h4 class="card-title ">
                                {{$title??''}}
                                <small class="float-sm-right">
                                    {{-- <a href="{{url('amp_report_excel')}}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> </a>  --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#SpecificTaskModal" data-json="null" > Nuevo  <i class="fa fa-plus-circle"></i> </button>
                                </small>
                            </h4>
                        </h3>
                    </div>
                    <div class="card-body">
                        
                        <table id="lista" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cod.</th>
                                    <th>Tareas</th>
                                    <th>Meta</th>
                                    <th>Ejecutado</th>
                                    <th>Eficacia</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specific_tasks as $item)
                                <tr>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->meta }}</td>
                                    <td>{{$item->executed??'' }}</td>
                                    <td>{{$item->efficacy?$item->efficacy.'%':'' }}</td>
                                    <td>
                                        {{-- <a href="{{url('operation_tasks/'.$item->id)}}"><i class="material-icons text-warning">folder</i></a> --}}
                                    <a href="#"><i class="material-icons text-primary" data-toggle="modal" data-target="#TaskModal" data-json="{{$item}}" data-programmings='{{$item->programmings}}'>edit</i></a>
                                        <a href="#"><i class="material-icons text-danger">delete</i></a>
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        {{-- <div id='calendar'></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
	{{-- aqui los modals --}}
	
<specific-task-component url='{{url('specific_tasks')}}' csrf='{!! csrf_field('POST') !!}' :task="{{$task}}" :programming='{{ json_encode($programming)}}'  ></specific-task-component>
    {{-- <indicadores-component url='{{url('action_short_term')}}' csrf='{!! csrf_field('POST') !!}' year="{{$year}}"  ></indicadores-component> --}}
</div>
@endsection
