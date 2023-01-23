@extends('layouts.app')
@section('title', __('village'))

@section('content')
<div class="container">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            {{ __('Manage Village') }}
        </h1>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="btn btn-outline-success"  href="{{ route('village.create') }}">{{ __(' Add village') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page">Village</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Other-Tabs
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('employee.index')}}">Employee</a></li>
            <li><a class="dropdown-item" href="{{route('island.index')}}">Island</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('training_type.index')}}">Training Types</a></li>
            <li><a class="dropdown-item" href="{{route('training.index')}}">Training Details</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

        <!--
         <nav aria-label="breadcrumb" class="navbar navbar-light" style="background-color: #e3f2fd;">
            <ol class="breadcrumb">
            <li><a href="{{ route('village.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' Add village') }}</button></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee List</a></li>
                <li class="breadcrumb-item active" aria-current="page">village List</li>
                <div class="justify-content-right">
                    <li><input  type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}"></li>
                </div>
            </ol>
        </nav>
        -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header with-border">
                        <div class="">
                            <!--Add Button--> 
                        </div>
                     </div>
            </div>
            <div class="box-body">
                
            
            </div>
                
                <div  class="col-md-6">
                    <!--Search Blank-->
                </div>

                <!-- Notification Box -->
                <div class="col-md-12">
                    @if (!empty(Session::get('message')))
                    <div class="alert alert-success alert-dismissible" id="notification_box">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                    </div>
                    @elseif (!empty(Session::get('exception')))
                    <div class="alert alert-warning alert-dismissible" id="notification_box">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                    </div>
                    @endif
                </div>
                <!-- /.Notification Box -->
        <div id="printable_area" class="col-md-12 table-responsive">
               <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __(' SL#') }}</th>
                            <th>{{ __('Island Name') }}</th>
                            <th>{{ __('Village Name') }}</th>
                            <th>{{ __('Village Description') }}</th>
                            <th>{{ __(' Created At') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php $sl = 1; @endphp
                        
                        @foreach($villages as $village)
                        <tr>
                            <td>{{ $sl++ }}</td>
                             <td>{{ $village->island->island_name }}</td>
                            <td>{{ $village['village_name'] }}</td>
                            <td>{{ $village['village_description'] }}</td>
                            
                        
                            <td class="text-center">{{ date("d F Y", strtotime($village['created_at'])) }}</td>
                           
                           
                            <td class="text-center">
                            <a class="btn btn-info text-center" href="{{route('village.show', $village['uuid'])}}">Show</a>      
                               <a href="{{ route('village.edit', $village['uuid']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
                              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
</div>
@endsection