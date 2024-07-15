<section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
    data-background="@if (getOptions('others', 'others_breadcrumb_image') != null) {{ getOptions('others', 'others_breadcrumb_image') }} @endif">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="page__title-wrapper">
                    <h3 class="page__title">
                        {{ ucwords(str_replace('-', ' ', Request::segment(1))) }}
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="inactive">Home</a></li>
                            <?php $link = ''; ?>
                            @for ($i = 1; $i <= count(Request::segments()); $i++)
                                @if (($i < count(Request::segments())) & ($i > 0))
                                    <?php $link .= '/' . Request::segment($i); ?>
                                    @if ($i == 1)
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
                                        </li>
                                    @endif
                                @else
                                    <li class="breadcrumb-item active" aria-current="page"><a>
                                            {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a>
                                    </li>
                                @endif
                            @endfor
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
