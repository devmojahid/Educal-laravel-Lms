@extends("backend.layouts.master")
@section("title",__("dashboard.quiz"))
@include("backend.layouts.partial.data-table-style")

@section("content")
  <section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.all_quiz") }}</h3>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route("admin.course.createQuizData",$courseId) }}">
                        <i class="fas fa-plus"></i>
                        </i> {{ __("dashboard.add_quiz") }}
                    </a>
                </div>
            </div>
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
                      <th>SL.</th>
                      <th>Title</th>
                      <th>status</th>
                      <th>Type</th>
                      <th>Add Question</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($quizes as $key=>$quize)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $quize->title }}</td>
                        <td>{{ $quize->quiz_status }}</td>
                        <td>{{ $quize->quiz_type }}</td>
                        
                        <td>
                          <a href="{{ route("admin.course.getQuizQuestionData",$quize->id) }}" class="btn btn-primary mr-2">
                            <i class="fas fa-plus"></i> All Question
                          </a>
                        </td>
                        <td class="d-flex items-center">  
                          <a href="{{ route("admin.course.editQuizData",[$courseId,$quize->id]) }}" class="btn btn-success mr-2">
                            <i class="fas fa-edit"></i>
                          </a>
                            <a href="javascript:void(0)" data-item_id="{{ $quize->id }}" id="delete"
                                class="btn btn-danger delete_item">
                                <i class="fas fa-trash"></i>
                            </a>
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
@endsection

@include("backend.layouts.partial.data-table-script")

<x-delete-item>
  <x-slot name='route'>
      {{ route('admin.course.deleteQuizData') }}
  </x-slot>
</x-delete-item>