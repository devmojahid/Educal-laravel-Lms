@extends("backend.layouts.master")
@section("title","Create Role")
@section("content")

    
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.create") }} {{ __("dashboard.role") }}</h3>
            </div>
            @can("role.list")
                <div class="col-sm-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route("role.index") }}">
                            <i class="fas fa-plus"></i>
                            </i> {{ __("dashboard.all") }} {{ __("dashboard.role") }}
                        </a>
                    </div>
                </div>        
            @endcan
        </div>
    </div>
</section>

<form id="roleForm" action="{{ route("role.store") }}" method="POST">
    @csrf
   <div class="card">
        <div class="card-body">
            {{-- Role Name --}}

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Role Name <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old("name") }}" class="form-control" id="name" placeholder="Enter Role Name" required>
                </div>
                @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group row mt-3">
                <label for="permisson" class="col-sm-2 col-form-label">Sellect All Permissons</label>
                <div class="col-sm-10">
                    <div class="custom-control custom-checkbox mt-1">
                        <input class="custom-control-input" type="checkbox" id="permission-sellect-all">
                        <label for="permission-sellect-all" class="custom-control-label">Sellect All</label>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="permisson" class="col-sm-2 col-form-label">Permissons <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    @foreach ($permissions as $permission)
                        <div class="custom-control custom-checkbox mt-1">
                            <input class="custom-control-input" type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}" value="{{ $permission->name }}">
                            <label for="permission-{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permissons')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
   </div>
</form>
@endsection

@push("scripts")
   <script>
         $(document).ready(function(){
            $("#permission-sellect-all").on("click",function(){
                if($(this).is(":checked")){
                    //check all the checkbox
                    $("input[type=checkbox]").prop("checked",true);
                }else{
                    //uncheck all the checkbox
                    $("input[type=checkbox]").prop("checked",false);
                }
            });
         });
   </script>
@endpush