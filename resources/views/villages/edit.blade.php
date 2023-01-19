@extends('layouts.app')

@section('content')

         <div class="row justify-content-center mt-0">
          <div class="col-lg-8">
          <div class="box-header with-border">
           <h3 class="box-title">{{ __('ENTER VILLAGE DETAILS') }}</h3>   
         </div>
          <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('village.update', $village->uuid) }}" >
             @csrf

             <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">   
              <div class="row gx-5">
                  <div class="form-group col-md-12">
                  <label for="village_description" class="fg-grey">Island Name</label>
                  <select name="island_id" id="island_id" class="form-control">
                     <option value="" selected disabled>{{ __('Select one') }}</option>
                     @foreach($islands as $island)
                     <option value="{{ $island['id'] }}" {{  $island['id'] == $village['island_id'] ? 'selected' : '' }}>{{ $island['island_name'] }}</option>
                     @endforeach
                  </select>
                </div>
               
                <div class="form-group col-md-12">
                  <label for="village_name" class="fg-grey">Village Name</label>
                  <input type="text" class="form-control" id="village_name" placeholder="Village Name" name="village_name" value="{{@old('village_name',$village->village_name)}}"> 
                </div>

                <div class="form-group col-md-12">
                  <label for="village_description" class="fg-grey">Village Description</label>
                  <input type="text" class="form-control" id="village_description" placeholder="Village Description" name="village_description" value="{{@old('village_description',$village->village_description)}}"> 
                </div>
              
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary px-3">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    
@endsection
   