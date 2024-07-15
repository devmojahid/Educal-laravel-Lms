   @extends('backend.layouts.master')
   @section('title', 'Book Genre')
   @include('backend.layouts.partial.data-table-style')

   @section('content')
       <section class="content-header info-box p-3 rounded">
           <div class="container-fluid">
               <div class="row mb-2 mt-2">
                   <div class="col-sm-6">
                       <h3 class="card-title">{{ __('dashboard.genre') }}</h3>
                   </div>
                   @if (auth()->user()->usertype == 'admin')
                       <div class="col-sm-6">
                           <div class="float-right">
                               <button type="button" class="btn btn-primary" data-toggle="modal"
                                   data-target="#createGenreModal">
                                   {{ __('dashboard.add_new') }} {{ __('dashboard.genre') }}
                               </button>
                           </div>
                       </div>
                   @endif
               </div>
           </div>
       </section>

       {{--  Main content  --}}

       <section class="content">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-12">
                       <div class="card">
                           <!-- /.card-header -->
                           <div class="card-body table-responsive p-3">
                               <table id="datatable" class="table table-bordered table-hover text-nowrap">
                                   <thead>
                                       <tr>
                                           <th>{{ __('dashboard.sn') }}</th>
                                           <th>{{ __('dashboard.name') }}</th>
                                           <th>{{ __('dashboard.image') }}</th>
                                           <th>{{ __('dashboard.status') }}</th>
                                           <th>{{ __('dashboard.action') }}</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($genres as $key => $genre)
                                           <tr>
                                               <td>{{ $key += 1 }}</td>
                                               <td>{{ $genre->title }}</td>
                                               <td>
                                                   @isset($genre->image)
                                                       <img src="{{ $genre->image }}" alt="image"
                                                           style="width: 50px; height: 50px;">
                                                   @endisset
                                               </td>
                                               <td>{{ $genre->status }}</td>
                                               <td>
                                                   @if (auth()->user()->usertype == 'admin')
                                                       @if ($genre->user_id == Auth::user()->id || Auth::user()->usertype == 'admin')
                                                           <a href="javascript:void(0)" type="button"
                                                               class="btn tp-edit-btn edit_genre_form" data-toggle="modal"
                                                               data-target="#GenreeditModal" data-id="{{ $genre->id }}"
                                                               data-title="{{ $genre->title }}"
                                                               data-status="{{ $genre->status }}"
                                                               data-description="{{ $genre->description }}"
                                                               data-meta_title="{{ $genre->meta_title }}"
                                                               data-meta_description="{{ $genre->meta_description }}"
                                                               data-image="{{ $genre->image }}">
                                                               <span>
                                                                   <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                       height="16" viewBox="0 0 24 24" fill="none"
                                                                       stroke="currentColor" stroke-width="2"
                                                                       stroke-linecap="round" stroke-linejoin="round"
                                                                       class="feather feather-edit">
                                                                       <path
                                                                           d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                       </path>
                                                                       <path
                                                                           d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                       </path>
                                                                   </svg>
                                                               </span>
                                                           </a>
                                                       @endif
                                                   @endif
                                                   @if (auth()->user()->usertype == 'admin')
                                                       @if ($genre->user_id == Auth::user()->id || Auth::user()->usertype == 'admin')
                                                           <a href="javascript:void(0)" data-genre_id="{{ $genre->id }}"
                                                               class="btn tp-delet-btn delete_genre">
                                                               <span>
                                                                   <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                       height="16" viewBox="0 0 24 24" fill="none"
                                                                       stroke="currentColor" stroke-width="2"
                                                                       stroke-linecap="round" stroke-linejoin="round"
                                                                       class="feather feather-trash-2">
                                                                       <polyline points="3 6 5 6 21 6"></polyline>
                                                                       <path
                                                                           d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                       </path>
                                                                       <line x1="10" y1="11" x2="10"
                                                                           y2="17"></line>
                                                                       <line x1="14" y1="11" x2="14"
                                                                           y2="17"></line>
                                                                   </svg>
                                                               </span>
                                                           </a>
                                                       @endif
                                                   @endif
                                               </td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       {{-- Genre insert modal --}}
       <div class="modal fade" id="createGenreModal">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <form action="{{ route('admin.book-genres.store') }}" id="GenreForm" enctype="multipart/form-data"
                       method="POST">
                       @csrf
                       <div class="modal-header">
                           <h4 class="modal-title">Genre Create</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>

                       <div class="modal-body">
                           <div class="errorMassage mb-3"></div>
                           <div class="card-body">
                               <div class="form-group">
                                   <label for="title">Genre Title</label>
                                   <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Enter Title" required>
                               </div>
                               <div class="form-group">
                                   <label for="description">Genre Description</label>
                                   <textarea class="form-control" name="description" rows="3" id="description"></textarea>
                               </div>

                               <div class="form-group">
                                   <label for="image">Genre Image</label>
                                   <input type="file" class="form-control"
                                       accept="image/png, image/jpeg, image/jpg, image/svg+xml" name="image"
                                       id="image" />
                               </div>

                               <div>
                                   <img src="" alt="image" class="image_preview_insert"
                                       style="width: 50px; height: 50px;display:none">
                               </div>

                               <div class="form-group">
                                   <label>Genre Status</label>
                                   <select name="status" id="status" class="custom-select">
                                       <option value="active">Active</option>
                                       <option value="inactive">Inactive</option>
                                   </select>
                               </div>

                               {{-- Meta section  --}}
                               <div>
                                   <h3>Meta Section</h3>
                                   <hr>
                               </div>

                               <div class="form-group">
                                   <label for="meta_title">Meta Title</label>
                                   <input type="text" name="meta_title" class="form-control" id="meta_title"
                                       placeholder="Enter Meta Title">
                               </div>

                               <div class="form-group">
                                   <label for="meta_description">Meta Description</label>
                                   <textarea class="form-control" name="meta_description" rows="3" id="meta_description"></textarea>
                               </div>
                           </div>
                       </div>

                       <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" id="submitBtn" class="btn btn-primary">Create Genre</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       {{-- Genre edit modal --}}
       <div class="modal fade" id="GenreeditModal">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <form id="EditGenreForm" enctype="multipart/form-data" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="modal-header">
                           <h4 class="modal-title">Genre Edit</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>

                       <div class="modal-body">
                           <div class="errorMassage mb-3"></div>
                           <div class="card-body">
                               <input type="hidden" name="id" id="up_id">
                               <div class="form-group">
                                   <label for="title">Genre Title</label>
                                   <input type="text" name="title" class="form-control" id="up_title"
                                       placeholder="Enter Title" required>
                               </div>
                               <div class="form-group">
                                   <label for="description">Genre Description</label>
                                   <textarea class="form-control" name="description" rows="3" id="up_description"></textarea>
                               </div>
                               <div class="form-group">
                                   <label for="image">Genre Image</label>
                                   <input type="file" class="form-control"
                                       accept="image/png, image/jpeg, image/jpg, image/svg+xml" name="image"
                                       id="up_image" />
                               </div>
                               <div>
                                   <img src="" alt="image" class="image_preview mb-2"
                                       style="width: 50px; height: 50px;display:none">
                               </div>
                               <div class="form-group">
                                   <label>Genre Status</label>
                                   <select name="status" id="up_status" class="custom-select">
                                       <option value="active">Active</option>
                                       <option value="inactive">Inactive</option>
                                   </select>
                               </div>

                               {{-- Meta section  --}}
                               <div>
                                   <h3>Meta Section</h3>
                                   <hr>
                               </div>

                               <div class="form-group">
                                   <label for="meta_title">Meta Title</label>
                                   <input type="text" name="meta_title" class="form-control" id="up_meta_title"
                                       placeholder="Enter Meta Title">
                               </div>

                               <div class="form-group">
                                   <label for="meta_description">Meta Description</label>
                                   <textarea class="form-control" name="meta_description" rows="3" id="up_meta_description"></textarea>
                               </div>
                           </div>
                       </div>

                       <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" id="updateBtn" class="btn btn-primary">Update Genre</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   @endsection

   @include('backend.layouts.partial.data-table-script')
   @push('scripts')
       <script>
           "use strict";
           var Toast = Swal.mixin({
               toast: true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 3000,
               timerProgressBar: true,
           });
           $(document).ready(function() {

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               // image preview
               function handleImageChange(selector, previewClass) {
                   $(document).on('change', selector, function() {
                       $('.error_success_msg_container').html('');
                       if (this.files && this.files[0]) {
                           let img = document.querySelector(previewClass);
                           img.style.display = 'block';
                           img.onload = () => {
                               URL.revokeObjectURL(img.src); // Free memory by releasing object URL
                           }
                           img.src = URL.createObjectURL(this.files[0]);
                       }
                   });
               }

               // Call the function for each image input
               handleImageChange('#image', '.image_preview_insert');
               handleImageChange('#up_image', '.image_preview');
               //Genre insert
               $(document).on('click', '#submitBtn', function(e) {
                   e.preventDefault();
                   let formdata = new FormData($('#GenreForm')[0]);
                   $.ajax({
                       method: 'post',
                       url: "{{ route('admin.book-genres.store') }}",
                       data: formdata,
                       contentType: false,
                       processData: false,
                       success: function(res) {
                           if (res.status == 'success') {
                               $('#GenreForm')[0].reset();
                               $("#image").val('');
                               $('.image_preview_insert').hide();
                               $('#createGenreModal').modal('hide');
                               $('.table').load(location.href + ' .table');
                               Toast.fire({
                                   icon: 'success',
                                   title: res.message
                               });

                           }
                       },
                       error: function(err) {
                           let error = err.responseJSON;
                           $.each(error.errors, function(index, value) {
                               $('.errorMassage').append('<span class="text-danger">' +
                                   value + '<span>' + '<br>');
                           });
                       }
                   });
               })
           });

           //product show in edit form
           $(document).on('click', '.edit_genre_form', function() {
               let id = $(this).data('id');
               let title = $(this).data('title');
               let description = $(this).data('description');
               let status = $(this).data('status');
               let image = $(this).data('image');
               let meta_title = $(this).data('meta_title');
               let meta_description = $(this).data('meta_description');
               if (image != null && image != '') {
                   $('.image_preview').show();
                   $('.image_preview').attr('src', image);
               } else {
                   $('.image_preview').hide();
               }
               $('#up_id').val(id);
               $('#up_title').val(title);
               $('#up_description').val(description);
               $('#up_status').val(status);
               $('#up_meta_title').val(meta_title);
               $('#up_meta_description').val(meta_description);
           })

           //update product
           $(document).on('click', '#updateBtn', function(e) {
               e.preventDefault();
               let formdata = new FormData($('#EditGenreForm')[0]);
               let id = $('#up_id').val();
               $.ajax({
                   method: 'POST',
                   url: "{{ route('admin.book-genres.update', '') }}/" + id,
                   data: formdata,
                   contentType: false,
                   processData: false,
                   success: function(res) {
                       if (res.status == 'success') {
                           $('#EditGenreForm')[0].reset();
                           $("#up_image").val('');
                           $('.image_preview').hide();
                           $('#GenreeditModal').modal('hide');
                           $('.table').load(location.href + ' .table');
                           Toast.fire({
                               icon: 'success',
                               title: res.message
                           });
                       }
                   },
                   error: function(err) {
                       let error = err.responseJSON;
                       $.each(error.errors, function(index, value) {
                           $('.errorMassage').append('<span class="text-danger">' + value +
                               '<span>' + '<br>');
                       });
                   }
               });
           })

           //delete product
           $(document).on('click', '.delete_genre', function(e) {
               e.preventDefault();
               Swal.fire({
                   title: 'Are you sure?',
                   text: "Once Delete, This will be Permanently Delete!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       let genre_id = $(this).data('genre_id');
                       $.ajax({
                           url: "{{ route('admin.book-genres.update', '') }}/" + genre_id,
                           method: 'DELETE',
                           data: {
                               id: genre_id
                           },
                           success: function(res) {
                               if (res.status == 'success') {
                                   $('.table').load(location.href + ' .table');
                                   Toast.fire({
                                       icon: 'success',
                                       title: res.message
                                   });
                               }
                           }
                       });
                   }
               })
           })
       </script>
   @endpush
