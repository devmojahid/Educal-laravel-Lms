@php
    $becomeInstractor = App\Models\InsructorApply::orderBy('id', 'desc')->get();
    $becomeInstractorSection = App\Models\SystemSetting::where('key', 'become_instructor')->get();
    if (isset($becomeInstractorSection[0])) {
        $becomeInstractorSection = json_decode($becomeInstractorSection[0]->value, true);

        // Check if the key exists before accessing it
        if (isset($becomeInstractorSection['title']) && isset($becomeInstractorSection['description'])) {
            $title = sanitizeInput($becomeInstractorSection['title']);
            $description = sanitizeInput($becomeInstractorSection['description']);
        } else {
            // Handle the case where title or description is not set
            $title = 'Default Title';
            $description = 'Default Description';
        }
    }
@endphp

<section class="what__area pt-115">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section__title-wrapper mb-60 text-center">
                    @isset($becomeInstractorSection['title'])
                        <h2 class="section__title">
                            {{ sanitizeInput($becomeInstractorSection['title']) }}
                            </span></h2>
                    @endisset
                    @isset($becomeInstractorSection['description'])
                        <p>{{ sanitizeInput($becomeInstractorSection['description']) }}</p>
                    @endisset
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($becomeInstractor as $instractor)
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="what__item transition-3 mb-30 p-relative fix">
                        <div class="what__thumb w-img">
                            <img src="{{ $instractor->bg_image }}" alt="">
                        </div>
                        <div class="what__content p-absolute text-center">
                            <h3 class="what__title white-color">Become <br> an Instructor</h3>
                            <button data-bs-toggle="modal" data-bs-target="#instractur"
                                class="e-btn e-btn-border-2">{{ $instractor->button_text }}</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="instractur" tabindex="-1" aria-labelledby="instracturLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('instructor.apply.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instracturLabel">Submit Your Instructor Application</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"
                            value="{{ auth()->user()->first_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"
                            value="{{ auth()->user()->last_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" value="{{ auth()->user()->phone }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{ auth()->user()->address }}"
                            readonly>
                    </div>
                    {{-- cv upload pdf  --}}
                    <div class="mb-3">
                        <label for="cv_upload" class="form-label">Upload CV</label>
                        <input type="file" name="cv" class="form-control" id="cv_upload"
                            placeholder="Upload Your Cv">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="e-btn">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
