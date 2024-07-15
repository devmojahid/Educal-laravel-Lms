@if ($page_title_show)
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ $section_title }}</h3>
            </div>
            @if ($button_show)
            <div class="col-sm-6">
                <div class="float-right">
                    @if ($modal_id != null)
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $modal_id }}">
                        Add New {{ $section_title }}
                      </button>
                    @else
                    <a class="btn btn-primary" href="{{ route($route) }}">
                        <i class="fas fa-plus"></i>
                        </i>{{ $button_title }}
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif