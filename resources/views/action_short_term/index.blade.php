@extends('layouts.app')
@section('title')
    Accion a Mediano PLazo
@endsection
@section('breadcrums')
    {{ Breadcrumbs::render('action_short_term_year',$year) }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                   
                    <div class="row">
                        <div class="col-md-4">
                                <i class="fa fa-calendar-o" style="font-size:40px;"></i>
                        </div>
                        <div class="col-md-8">
                            <!-- /.widget-user-image -->
                            <h3 >{{ $year->action_medium_term->code}}</h3>
                            <h5 > <i class="material-icons">flag</i> {{ $year->action_medium_term->alcance_meta}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <span> {{$year->action_medium_term->description}}</span>
                    </div>                    
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        @foreach ($year->action_medium_term->years as $item)
                        
                            <li class="nav-item" >
                                <a href="{{url('action_short_term_year/'.$item->id)}}" class="nav-link">
                                    @if($item->id==$year->id)
                                        <i class="fa fa-folder-open text-info"></i>
                                    @else
                                        <i class="fa fa-folder text-warning"></i>
                                    @endif
                                 {{'Gestion '.$item->year}} <span class="float-right badge bg-success"> <i class="fa fa-flag"></i> {{$item->meta}}</span>
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
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ActionShortTermModal" data-json="null" > Nuevo  <i class="fa fa-plus-circle"></i> </button>
                                </small>
                            </h4>

                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- {{$programmatic_structures}} --}}

                        <table id="lista" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cod.</th>
                                    <th>Accion Corto Plazo</th>
                                    <th>Meta</th>
                                    <th>Ejecutado</th>
                                    <th>Eficacia</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lista as $item)
                                <tr>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->meta }}</td>
                                    <td>{{$item->executed??'' }}</td>
                                    <td>{{$item->efficacy?$item->efficacy.'%':'' }}</td>
                                    <td>
                                        <a href="{{url('ast_operations/'.$item->id)}}"><i class="material-icons text-warning">folder</i></a>
                                        <a href="#"><i class="material-icons text-primary">edit</i></a>
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
    <indicadores-component url='{{url('action_short_term')}}' csrf='{!! csrf_field('POST') !!}' year="{{$year}}" :structures="{{$programmatic_structures}}"  ></indicadores-component>
</div>
@endsection
