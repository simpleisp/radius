<div class="row">
   <div class="col-lg-12">
      <div class="d-flex align-items-end">
         {{-- 
         <h5 class="mb-0 text-muted d-none d-md-block">
            {{env('APP_NAME')}} Backup Panel
         </h5>
         --}}
         <button id="create-backup" class="btn btn-primary btn-sm ml-auto px-3" style="padding: .25rem .5rem;">
         Create Full Backup
         </button>
         <div class="dropdown ml-3">
            <button class="btn btn-info btn-md dropdown-toggle" id="dropdownMenuButton"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               style="padding: .25rem .5rem; height: calc(1.5em + .5rem); /* Adjusted padding and height */">
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="#" id="create-backup-only-db" wire:click.prevent="">
               Create database backup
               </a>
               <a class="dropdown-item" href="#" id="create-backup-only-files" wire:click.prevent="">
               Create files backup
               </a>
            </div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-12">
            <div class="card mb-4">
               <div class="card-header d-flex align-items-end" style="border-bottom: none;">
                  <button class="btn btn-primary btn-sm btn-refresh ml-auto"
                     wire:loading.class="loading"
                     wire:loading.attr="disabled"
                     wire:click="updateBackupStatuses"
                     >
                     <svg xmlns="http://www.w3.org/2000/svg" width="0.7875rem" height="0.7875rem" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path class="heroicon-ui" d="M6 18.7V21a1 1 0 0 1-2 0v-5a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2H7.1A7 7 0 0 0 19 12a1 1 0 1 1 2 0 9 9 0 0 1-15 6.7zM18 5.3V3a1 1 0 0 1 2 0v5a1 1 0 0 1-1 1h-5a1 1 0 0 1 0-2h2.9A7 7 0 0 0 5 12a1 1 0 1 1-2 0 9 9 0 0 1 15-6.7z"/>
                     </svg>
                  </button>
               </div>
               <table class="table table-hover mb-0">
                  <thead>
                     <tr>
                        <th scope="col">Disk</th>
                        <th scope="col">Healthy</th>
                        <th scope="col">Amount of backups</th>
                        <th scope="col">Newest backup</th>
                        <th scope="col">Used storage</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($backupStatuses as $backupStatus)
                     <tr>
                        <td>{{ $backupStatus['disk'] }}</td>
                        <td>
                           @if($backupStatus['healthy'])
                           <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" height="24px">
                              <path d="M2.93 17.07A10 10 0 1 0 17.07 2.93 10 10 0 0 0 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM4 10l2-2 3 3 5-5 2 2-7 7-5-5z" fill="var(--success)" fill-rule="evenodd"/>
                           </svg>
                           @else
                           <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" height="24px">
                              <path d="M11.41 10l2.83-2.83-1.41-1.41L10 8.59 7.17 5.76 5.76 7.17 8.59 10l-2.83 2.83 1.41 1.41L10 11.41l2.83 2.83 1.41-1.41L11.41 10zm-8.48 7.07A10 10 0 1 0 17.07 2.93 10 10 0 0 0 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66z" fill="var(--danger)" fill-rule="evenodd"/>
                           </svg>
                           @endif
                        </td>
                        <td>{{ $backupStatus['amount'] }}</td>
                        <td>{{ $backupStatus['newest'] }}</td>
                        <td>{{ $backupStatus['usedStorage'] }}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="card">
               <div class="card-header d-flex align-items-end" style="border-bottom: none;">
                  @if(count($disks))
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                     @foreach($disks as $disk)
                     <label class="btn btn-outline-secondary {{ $activeDisk === $disk ? 'active' : '' }}"
                        wire:click="getFiles('{{ $disk }}')"
                        >
                     <input type="radio" name="options" {{ $activeDisk === $disk ? 'checked' : '' }}>
                     {{ $disk }}
                     </label>
                     @endforeach
                  </div>
                  @endif
                  <button class="btn btn-primary btn-sm btn-refresh ml-auto"
                  wire:loading.class="loading"
                  wire:loading.attr="disabled"
                  wire:click="getFiles"
                  {{ $activeDisk ? '' : 'disabled' }}
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="0.7875rem" height="0.7875rem" viewBox="0 0 24 24" fill="currentColor">
                     <path class="heroicon-ui" d="M6 18.7V21a1 1 0 0 1-2 0v-5a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2H7.1A7 7 0 0 0 19 12a1 1 0 1 1 2 0 9 9 0 0 1-15 6.7zM18 5.3V3a1 1 0 0 1 2 0v5a1 1 0 0 1-1 1h-5a1 1 0 0 1 0-2h2.9A7 7 0 0 0 5 12a1 1 0 1 1-2 0 9 9 0 0 1 15-6.7z"/>
                  </svg>
                  </button>
               </div>
               <table class="table table-hover mb-0">
                  <thead>
                     <tr>
                        <th scope="col">Path</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Size</th>
                        <th scope="col"></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($files as $file)
                     <tr>
                        <td>{{ $file['path'] }}</td>
                        <td>{{ $file['date'] }}</td>
                        <td>{{ $file['size'] }}</td>
                        <td class="text-right pr-3">
                           <a class="action-button mr-2" href="#" onclick="restoreBackup('{{ $file['path'] }}', '{{ $activeDisk }}')" title="Restore" wire:ignore>
                              <svg height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M0 0h48v48h-48z" fill="none"/>
                                 <path d="M25.99 6c-9.95 0-17.99 8.06-17.99 18h-6l7.79 7.79.14.29 8.07-8.08h-6c0-7.73 6.27-14 14-14s14 6.27 14 14-6.27 14-14 14c-3.87 0-7.36-1.58-9.89-4.11l-2.83 2.83c3.25 3.26 7.74 5.28 12.71 5.28 9.95 0 18.01-8.06 18.01-18s-8.06-18-18.01-18zm-1.99 10v10l8.56 5.08 1.44-2.43-7-4.15v-8.5h-3z"/>
                              </svg>
                           </a>
                           <a class="action-button" href="#" target="_blank" wire:click.prevent="showDeleteModal({{ $loop->index }})">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                 <path class="heroicon-ui" d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"/>
                              </svg>
                           </a>
                        </td>
                     </tr>
                     @endforeach
                     @if(!count($files))
                     <tr>
                        <td class="text-center" colspan="4">
                           {{ 'No backups present' }}
                        </td>
                     </tr>
                     @endif
                  </tbody>
               </table>
               <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-body">
                           <h5 class="modal-title mb-3">Delete backup</h5>
                           @if($deletingFile)
                           <span class="text-muted">
                           Are you sure you want to delete the backup created at {{ $deletingFile['date'] }} ?
                           </span>
                           @endif
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-outline-secondary cancel-button" onclick="closeModal()">
                           Cancel
                           </button>
                           <button type="button" class="btn btn-danger delete-button" wire:click="deleteFile" wire:loading.attr="disabled">
                           <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                           <span wire:loading.remove>Delete</span>
                           <span wire:loading.delay class="text-muted">Deleting...</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="float-end">
         <p class="text-muted">
            Your Backup Code: <code class="text-info" style="font-size: 14px"><strong>{{ env('BACKUP_CODE') }}</strong></code>
         </p>
      </div>
      <script>
         document.addEventListener('livewire:load', function () {
             @this.updateBackupStatuses()
         
             @this.on('backupStatusesUpdated', function () {
                 @this.getFiles()
             })
         
             @this.on('showErrorToast', function (message) {
                 Toastify({
                     text: message,
                     duration: 10000,
                     gravity: 'bottom',
                     position: 'right',
                     backgroundColor: 'red',
                 }).showToast()
             })
         
             const backupFun = function (option = '') {
                   Toastify({
                       text: 'Creating a new backup in the background...' + (option ? ' (' + option + ')' : ''),
                       duration: 5000,
                       gravity: 'top',
                       position: 'right',
                   }).showToast();
         
                   @this.createBackup(option);
               };
         
             $('#create-backup').on('click', function () {
                 backupFun()
             })
             $('#create-backup-only-db').on('click', function () {
                 backupFun('only-db')
             })
             $('#create-backup-only-files').on('click', function () {
                 backupFun('only-files')
             })
         
             const deleteModal = $('#deleteModal')
             @this.on('showDeleteModal', function () {
                 deleteModal.modal('show')
             })
             @this.on('hideDeleteModal', function () {
                 deleteModal.modal('hide')
             })
         
             deleteModal.on('hidden.bs.modal', function () {
                 @this.deletingFile = null
             })
         })
      </script>
      <!-- Include SweetAlert CSS and JS files -->
      <!-- Include SweetAlert CSS and JS files -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script>
         function restoreBackup(filename, disk) {
             // Show confirmation dialog using SweetAlert
             Swal.fire({
                 title: 'Confirmation',
                 text: 'Are you sure you want to restore the backup?',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, restore it!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     // Call the function to initiate the restoration process
                     initiateBackupRestoration(filename, disk);
                 }
             });
         }
         
         function initiateBackupRestoration(filename, disk) {
             // Show loading spinner
             Swal.fire({
                 title: 'Restoring Backup',
                 html: 'Please wait...',
                 allowOutsideClick: false,
                 onBeforeOpen: () => {
                     Swal.showLoading();
                 }
             });
         
             // Initiate the restoration process
             fetch('/dashboard/settings/restore', {
                 method: 'POST',
                 headers: {
                     'Content-Type': 'application/json',
                     'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if using Laravel's CSRF protection
                 },
                 body: JSON.stringify({
                     filename: filename,
                     disk: disk
                 })
             })
             .then(response => response.json())
             .then(data => {
                 // Hide loading spinner
                 Swal.close();
         
                 if (data.success) {
                     // Show success message using SweetAlert
                     Swal.fire({
                         icon: 'success',
                         title: 'Success',
                         text: data.success,
                     });
                 } else if (data.error) {
                     // Show error message using SweetAlert
                     Swal.fire({
                         icon: 'error',
                         title: 'Error',
                         text: data.error,
                     });
                 } else {
                     // Show a generic error message if no specific error message is returned
                     Swal.fire({
                         icon: 'error',
                         title: 'Error',
                         text: 'An unexpected error occurred.',
                     });
                 }
             })
             .catch(error => {
                 // Hide loading spinner
                 Swal.close();
         
                 // Show error message using SweetAlert for network errors or exceptions
                 Swal.fire({
                     icon: 'error',
                     title: 'Error',
                     text: 'An error occurred: ' + error,
                 });
             });
         }
      </script>
      <script>
         function closeModal() {
          $('#deleteModal').modal('hide');
         }
      </script>
   </div>
</div>