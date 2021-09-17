<header class="site-header">
    <div class="container">
        <div class="header-layout">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('/images/logo.svg') }}" alt="logo">
                </a>
            </div>
            @if(session()->has('success_msg'))
            <div class="message">
                {!!session()->get('success_msg') !!}
            </div>
            @endif
        </div>
    </div>
</header>