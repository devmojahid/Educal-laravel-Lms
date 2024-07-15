@if(isset($lessonData))
    <div class="tp-board-main-wrapper">
        <div class="tp-board-main-content d-flex align-items-center justify-content-between">
            <div class="tp-board-main-content-left">
                <a href="#"><i class="far fa-angle-left"></i></a>
                <span>{{ $lessonData->title }}</span>
            </div>
        </div>
        
    <div class="tp-board-main-wrap">
        @if($lessonData->type == 'video')
            <div class="tp-board-course-video ratio ratio-16x9">
                <video controls>
                    <source src="{{ $lessonData->video }}" type="video/mp4">
                </video>
                </div>
        @elseif($lessonData->type == 'url')
            @php
                $videoURL = $lessonData->video_url;
                $videoID = extractVideoID($videoURL);
            @endphp

            @if ($videoID)
                <div class="tp-board-course-video ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/{{ $videoID }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
        @elseif($lessonData->type == 'vimeo')
            @php
                $videoURL = $lessonData->video_url;
                $videoID = extractVideoID($videoURL);
            @endphp

            @if ($videoID)
            <div class="tp-board-course-video ratio ratio-16x9">
                    <iframe src="https://player.vimeo.com/video/{{ $videoID }}" title="Vimeo video player" frameborder="0" allowfullscreen></iframe>
            </div>
            @endif
        @elseif($lessonData->type == 'audio')
            <div class="tp-board-course-video ratio ratio-16x9">
                <audio controls>
                    <source src="{{ $lessonData->audio }}" type="audio/mpeg">
                </audio>
            </div>
        @elseif($lessonData->type == 'image')
            <img src="{{ $lessonData->image }}" alt="">
        @elseif($lessonData->type == 'pdf')
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-board-box mt-40">
                            <div class="tp-board-box-content">
                            <h4 class="tp-board-box-title">Download Your Pdf</h4>
                            <p>To Download <a href="{{ $lessonData->pdf }}" class="text-primary" target="_blank">Click Here</a> your file.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($lessonData->type == 'ppt')
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-board-box mt-40">
                            <div class="tp-board-box-content">
                            <h4 class="tp-board-box-title">Download Your Pdf</h4>
                            <p>To Download <a href="{{ $lessonData->ppt }}" class="text-primary" target="_blank">Click Here</a> your file.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
        @if ($lessonData->description != null || $lessonData->description != '')
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-board-box mt-40">
                            <div class="tp-board-box-content">
                            <h4 class="tp-board-box-title">About Lesson</h4>
                            <p>{{ $lessonData->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@else

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-board-box mt-40">
                    <div class="tp-board-box-content">
                    <h4 class="tp-board-box-title">No Class Found</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @endif