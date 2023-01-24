@extends('layouts.app')
@section('title', __('Island'))

@section('content')
<div class="container">
<div class="content-wrapper">

<section class="content-header">
        <h1>
            {{ __('Manage Island') }}
        </h1>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="btn btn-outline-success"  href="{{ route('island.create') }}">{{ __(' Add Island') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page">Islands</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Quick-Links
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
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search.....">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
        

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
                            <th>{{ __(' Created At') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php $sl = 1; @endphp
                      
                        @foreach($islands as $island)
                        <tr>
                            <td>{{ $sl++ }}</td>
                     
                            
                            <td>{{ $island['island_name'] }}</td>
                            
                        
                            <td class="text-center">{{ date("d F Y", strtotime($island['created_at'])) }}</td>
                           
                           
                            <td class="text-center">
                            <a class="btn btn-info text-center" href="{{route('island.show', $island['id'])}}">Show</a>      
                               <a href="{{ route('island.edit', $island['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
                              
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