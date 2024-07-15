<div class="row">
   @forelse ($data as $course)
      @include("frontend.pages.course.single-course-in-list", ["course" => $course])
   @empty
      <div class="col-md-12">
         <div class="alert alert-danger">
            <h4>Sorry! No course found.</h4>
         </div>
      </div>
   @endforelse
    
 </div>