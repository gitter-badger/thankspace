{{-- style bootstrap-social  
<link href="{{ asset('assets/css/bootstrap-social.css') }}" rel="stylesheet" type="text/css">--}}

{{-- styles ori from github
{{ Minify::stylesheet( Config::get('assets.style') ) }} --}}

{{--*/
    $CssStyle = Config::get('assets.style');
/*--}}

@foreach($CssStyle as $css)
    {{ HTML::style($css) }}
@endforeach