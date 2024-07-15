@if(View::hasSection('meta_title'))
    <meta name="title" content="@yield("meta_title")">
@elseif(getOptions('meta','meta_title') != null)
    <meta name="title" content="{{ getOptions('meta','meta_title') }}">
@else
    <meta name="title" content="{{ env("APP_NAME") }}">
@endif
@if(View::hasSection('meta_description'))
    <meta name="description" content="@yield("meta_description")">
@elseif(getOptions('meta','meta_description') != null)
    <meta name="description" content="{{ getOptions('meta','meta_description') }}">
@else
    <meta name="description" content="{{ env("APP_NAME") }}">
@endif
@if(View::hasSection('meta_keywords'))
    <meta name="keywords" content="@yield("meta_keywords")">
@elseif(isset($meta_keywords))
    <meta name="keywords" content="{{ $meta_keywords }}">
@else
    <meta name="keywords" content="{{ env("APP_NAME") }}">
@endif