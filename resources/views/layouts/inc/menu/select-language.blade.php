@if (is_array(getSupportedLanguages()) && count(getSupportedLanguages()) > 1)
	<!-- Language Selector -->
	<li class="dropdown lang-menu nav-item">
		<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
			<span class="lang-title">{{ strtoupper(config('app.locale')) }}</span>
		</button>
		<ul id="langMenuDropdown" class="dropdown-menu dropdown-menu-right user-menu shadow-sm" role="menu">
			@foreach(getSupportedLanguages() as $langCode => $lang)
				@continue(strtolower($langCode) == strtolower(config('app.locale')))
				<li class="dropdown-item">
					<a href="{{ url('lang/' . $langCode) }}" tabindex="-1" rel="alternate" hreflang="{{ $langCode }}">
						<span class="lang-name">{!! $lang['native'] !!}</span>
					</a>
				</li>
			@endforeach
		</ul>
	</li>
@endif