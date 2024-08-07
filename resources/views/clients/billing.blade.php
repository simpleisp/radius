@extends('layouts.master') @section('title') billing @endsection @section('css')
<link href="{{URL::asset('assets/js/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('assets/css/datatable-custom.css')}}" rel="stylesheet" type="text/css" />
@endsection @section('content') 
{{-- @component('components.breadcrumb') @slot('li_1') Account @endslot @slot('title') settings @endslot @endcomponent --}}
<div class="row">
   <div class="col-lg-12">
      <div class="card mt-n4 mx-n4">
         <div class="bg-soft-light">
            @include('clients.header')
            <!-- end card body -->
         </div>
      </div>
      <!-- end card -->
   </div>
   <!-- end col -->
</div>
<div class="row">
   @include('layouts.partials.flash')
   <div class="card" id="orderList">
      <div class="card-header border-bottom-dashed">
         <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-exchange-dollar-line text-info"></i> Client billing</h5>
            <div class="flex-shrink-0">
               {{-- <a href="{{route('client.create.service',[$client->username])}}" class="btn btn-primary add-btn"><i class="ri-gps-line"></i> Create Service</a> --}}
               <button class="btn btn-soft-info add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Payment</button>
            </div>
         </div>
      </div>
      <div class="card-body pt-0">
         @if(isset($transactions) && count($transactions))
         <div class="table-responsive table-card mb-1">
            <table class="table table-nowrap align-middle table-striped" id="datatable" style="width: 100%;">
               <thead class="text-muted table-light">
                  <tr class="text-uppercase">
                     <th>ID</th>
                     <th>Type</th>
                     <th>Credit</th>
                     <th>Debit</th>
                     <th>Date</th>
                     <th>Title</th>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody class="list form-check-all">
                  @foreach($transactions as $transaction)
                  <tr class="no-border">
                     <td>{{ $transaction->id }}</td>
                     <td>
                        @if($transaction->type == 'deposit')
                        <div class="badge badge-soft-success badge-border fs-12">{{$transaction->type}}</div>
                        @else
                        <div class="badge badge-soft-info badge-border fs-12">Payment</div>
                        @endif
                     </td>
                     <td>
                        @if($transaction->type == 'deposit')
                        {{ number_format($transaction->amount, 2) }} ksh
                        @endif
                     </td>
                     <td>
                        @if($transaction->type == 'withdraw')
                        <code class="fs-14">{{ number_format($transaction->amount, 2) }} ksh</code>
                        @endif
                     </td>
                     <td>{{ $transaction->created_at->format('d-M-Y') }} <code class="text-info">[{{ $transaction->created_at->diffForHumans() }}]</code></td>
                     <td>
                        {{ $transaction->meta['title'] ?? 'N/A' }}
                     </td>
                     <td>
                        {{ $transaction->meta['description'] ?? 'N/A' }}
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         @else
         <div class="noresult" style="display: block;">
            <div class="text-center">
               <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width: 75px; height: 75px;"> </lord-icon>
               <h5 class="mt-2 text-danger">Sorry! No transaction Found</h5>
               <p class="text-muted mb-0">client has no transaction</p>
            </div>
         </div>
         @endif
      </div>
   </div>
</div>
<!--end col-->
</div>
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header p-3 bg-soft-info">
            <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
         </div>
         <form action="{{route('client.payment',[$client->username])}}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="mb-3">
                  <label for="amount" class="form-label">Amount </label>
                  <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="amount" value="{{old('amount')}}" />
                  @error('amount')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="mb-3">
                  <label for="reference" class="form-label">Reference </label>
                  <input type="text" name="reference" id="reference" class="form-control" placeholder="reference" value="{{old('reference')}}" />
               </div>
               <div class="mb-3">
                  <label for="description" class="form-label">Description </label>
                  <textarea name="description" id="description" class="form-control"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <div class="hstack gap-2 justify-content-end">
                  <a href="{{route('client.billing',[$client->username])}}" class="btn btn-light">Cancel</a>
                  <button type="submit" class="btn btn-soft-info" id="add-btn"><i class="las la-save"></i> Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!--end row-->
@endsection @section('script')
<script src="{{ URL::asset('/assets/js/jquery-3.6.1.js')}}"></script>
<script src="{{ URL::asset('/assets/js/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<!-- Include Moment.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Include DataTables Moment.js plugin -->
<script src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/datetime-moment.js"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('#datatable').DataTable({
        responsive: true,
        deferRender: true,
        "lengthMenu": [20, 50, 100],
        "pageLength": 50,
        "order": [[0, 'desc']], // Order by the fourth column (index 3) in descending order
        columnDefs: [
            { type: 'datetime-moment', targets: [4] } // Apply Moment.js plugin to the fourth column
        ],
        language: {
            paginate: {
                next: '&#8594;', // or '→'
                previous: '&#8592;' // or '←'
            }
        },
    });
});
</script>
@if (count($errors) > 0)
<script type="text/javascript">
   $(document).ready(function () {
       $("#showModal").modal("show");
   });
</script>
@endif @endsection