@extends('layouts.master') @section('title') general settings @endsection
@section('css')
@endsection
@section('content') 
{{-- @component('components.breadcrumb') @slot('li_1') Settings @endslot @slot('title') General @endslot @endcomponent  --}}
<div class="row">
   <div class="col-lg-12">
      <div class="card mt-n4 mx-n4">
         <div class="bg-soft-light">
            @include('settings.general.header')
            <!-- end card body -->
         </div>
      </div>
      <!-- end card -->
   </div>
   <!-- end col -->
</div>
<div class="row justify-content-center">
   <div class="col-lg-8">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
         <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{session('status')}}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif @if (session('error'))
      <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0" role="alert">
         <i class="ri-error-warning-line label-icon"></i><strong>Failed</strong>
         - {{session('error')}}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <br />
      @endif
      <div class="card">
         
         <div class="card-header border-bottom-dashed">
            <div class="d-flex align-items-center">
               <h5 class="card-title mb-0 flex-grow-1"> General Settings</h5>
               <div class="flex-shrink-0">
               </div>
            </div>
         </div>
        
         <div class="card-body"> 
            @if(!empty(setting('logo')) && file_exists(setting('logo')))
               <div class="text-center"><img style="max-height:120px" src="{{ asset(setting('logo')) }}" alt="logo"></div>
            @endif
            <form class="form-margin" action="{{route('settings.general_save')}}" Method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="nameInput" class="form-label">Company name</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="text" name="company" value="{{Setting::get('company')}}" class="form-control" id="companyname" placeholder="Enter name">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="websiteUrl" class="form-label">Phone number</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="text" name="company_phone" value="{{Setting::get('company_phone')}}" class="form-control" id="companyphone" placeholder="Phone number">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="email" class="form-label">Company email</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="email" name="company_email" value="{{Setting::get('company_email')}}" class="form-control" id="companyemail" placeholder="Email address">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="dateInput" class="form-label">Location</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="text" name="city" value="{{Setting::get('city')}}" class="form-control" id="location" placeholder="Company location">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="logo" class="form-label">Logo</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                  </div>
               </div>

               @if(setting('googlemap') == 'enabled')
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="latitude" class="form-label">Latitude</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="text" name="latitude" value="{{Setting::get('latitude')}}" class="form-control" id="location-lat" readonly>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-lg-3">
                     <label for="logitude" class="form-label">Longitude</label>
                  </div>
                  <div class="col-lg-9">
                     <input type="text" name="longitude" value="{{Setting::get('longitude')}}" class="form-control" id="location-lng" readonly>
                  </div>
               </div>
                  <div class="row mb-3">
                  <div class="col-lg-12"><div id="map" style="height: 400px; border:1px solid #ddd; border-radius:5px"></div></div>
                  </div>
               @endif
               
               <div class="row mb-3">
                  <div class="col-lg-12">
                     <label for="meassageInput" class="form-label">About</label>
                  </div>
                  <div class="col-lg-12">
                     <textarea class="form-control" name="about" id="editor" rows="4" placeholder="Brief description">{{Setting::get('about')}}</textarea>
                  </div>
               </div>
               <div class="col-12 text-end">
                  <div class="hstack gap-2 justify-content-end">
                     <button type="submit" class="btn btn-soft-success"
                        id="add-btn"><i class="las la-save"></i> Save</button>
                  </div>
               </div>
            </form>
            <!--end modal -->
         </div>
      </div>
   </div>
</div>
@php
    $latitude = setting('latitude') ?? 0;
    $longitude = setting('longitude') ?? 0;
@endphp

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@if(setting('googlemap') == 'enabled')
<script src="https://maps.googleapis.com/maps/api/js?key={{ setting('google_map_api_key') }}&libraries=places&callback=Function.prototype"></script>
{{-- <script src="{{URL::asset('/assets/js/google_map.js')}}"></script> --}}
<script src="{{ asset('/assets/js/google_map.js') }}" data-latitude="{{ $latitude }}" data-longitude="{{ $longitude }}"></script>
@endif

<script>
   ClassicEditor
   .create(document.querySelector('#editor'), {
      removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
      toolbar: {
         items: [
            // list the toolbar items you want to keep here
            'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'
         ]
      }
   })
   .catch( error => {
       console.error( error );
   } );
 
</script>


@endsection