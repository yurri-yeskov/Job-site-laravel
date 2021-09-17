<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
$hideOnMobile = '';
if (isset($latestOptions, $latestOptions['hide_on_mobile']) and $latestOptions['hide_on_mobile'] == '1') {
    $hideOnMobile = ' hidden-sm';
}
?>
@if (isset($latest) && !empty($latest) && $latest->posts->count() > 0)
    @includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
    <div class="container{{ $hideOnMobile }}">
        <div class="col-xl-12 content-box layout-section">
            <div class="row row-featured row-featured-category">
                
                <div class="col-xl-12 box-title no-border">
                    <div class="inner">
                        <h2>
                            <span class="title-3">{!! $latest->title !!}</span>
                            <a href="{{ $latest->link }}" class="sell-your-item">
                                {{ t('View more') }} <i class="icon-th-list"></i>
                            </a>
                        </h2>
                    </div>
                </div>

                <div class="posts-wrapper jobs-list">
                    @foreach($latest->posts as $key => $post)
                        <?php
                            $premiumClass = '';
                            $premiumBadge = '';
                            if (isset($post->featured) && $post->featured == 1) {
                                if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package)) {
                                    $premiumClass = ' premium-post';
                                    $premiumBadge = ' <span class="badge badge-dark pull-right">' . $post->latestPayment->package->short_name . '</span>';
                                }
                            }
                        ?>
                        <div class="item-list job-item{{ $premiumClass }}">
                            <div class="row">
                                <div class="col-md-1 col-sm-2 no-padding photobox">
                                    <div class="add-image">
                                        <a href="{{ \App\Helpers\UrlGen::post($post) }}">
                                            <img class="img-thumbnail no-margin"
                                                 alt="{{ $post->company_name }}"
                                                 src="{{ imgUrl(\App\Models\Post::getLogo($post->logo), 'medium') }}"
                                            >
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-11 col-sm-10 add-desc-box">
                                    <div class="add-details jobs-item">
                                        <h5 class="company-title ">
                                            @if (!empty($post->company_id))
                                                <a href="{{ \App\Helpers\UrlGen::company(null, $post->company_id) }}">
                                                    {{ $post->company_name }}
                                                </a>
                                            @else
                                                <strong>{{ $post->company_name }}</strong>
                                            @endif
                                        </h5>
                                        <h4 class="job-title">
                                            <a href="{{ \App\Helpers\UrlGen::post($post) }}">{{ $post->title }}</a>{!! $premiumBadge !!}
                                        </h4>
                                        <span class="info-row">
                                            @if (!config('settings.listing.hide_dates'))
                                                <span class="date">
                                                    <i class="icon-clock"></i> {!! $post->created_at_formatted !!}
                                                </span>
                                            @endif
                                            <span class="category">
                                                <i class="icon-folder-circled"></i>&nbsp;
                                                @if (isset($post->category->parent) && !empty($post->category->parent))
                                                    <a href="{!! \App\Helpers\UrlGen::category($post->category->parent) !!}">
                                                        {{ $post->category->parent->name }}
                                                    </a>&nbsp;&raquo;&nbsp;
                                                @endif
                                                <a href="{!! \App\Helpers\UrlGen::category($post->category) !!}">
                                                    {{ $post->category->name }}
                                                </a>
                                            </span>
                                            <span class="item-location">
                                                <i class="icon-location-2"></i>&nbsp;
                                                <a href="{!! \App\Helpers\UrlGen::city($post->city) !!}">
                                                    {{ $post->city->name }}
                                                </a>
												{{ (isset($post->distance)) ? '- ' . round($post->distance, 2) . getDistanceUnit() : '' }}
                                            </span>
                                            <span class="date">
                                                <i class="icon-clock"></i> {{ $post->postType->name }}
                                            </span>
                                            <span class="salary">
                                                <i class="icon-money"></i>&nbsp;
                                                @if ($post->salary_min > 0 || $post->salary_max > 0)
                                                    @if ($post->salary_min > 0)
                                                        {!! \App\Helpers\Number::money($post->salary_min) !!}
                                                    @endif
                                                    @if ($post->salary_max > 0)
                                                        @if ($post->salary_min > 0)
                                                            &nbsp;-&nbsp;
                                                        @endif
                                                        {!! \App\Helpers\Number::money($post->salary_max) !!}
                                                    @endif
                                                @else
                                                    {!! \App\Helpers\Number::money('--') !!}
                                                @endif
                                                @if (isset($post->salaryType) && !empty($post->salaryType))
                                                    {{ t('per') }} {{ $post->salaryType->name }}
                                                @endif
                                            </span>
                                        </span>
        
                                        <div class="jobs-desc">
                                            {!! \Illuminate\Support\Str::limit(strCleaner($post->description), 180) !!}
                                        </div>
        
                                        <div class="job-actions">
                                            <ul class="list-unstyled list-inline">
                                                @if (isset($post->savedByLoggedUser) && $post->savedByLoggedUser->count() > 0)
                                                    <li class="saved-job" id="{{ $post->id }}">
                                                        <a class="saved-job" id="saved-{{ $post->id }}" href="javascript:void(0)">
                                                            <span class="fa fa-heart"></span> {{ t('Saved Job') }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li id="{{ $post->id }}">
                                                        <a class="save-job" id="save-{{ $post->id }}" href="javascript:void(0)">
                                                            <span class="far fa-heart"></span> {{ t('Save Job') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a class="email-job" data-toggle="modal" data-id="{{ $post->id }}" href="#sendByEmail" id="email-{{ $post->id }}">
                                                        <i class="fa fa-envelope"></i>
                                                        {{ t('Email Job') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="tab-box save-search-bar text-center">
                    <a class="text-uppercase" href="{{ \App\Helpers\UrlGen::search() }}">
                        <i class="icon-briefcase"></i> {{ t('View all jobs') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
@endif

@section('modal_location')
    @parent
    @includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.send-by-email', 'layouts.inc.modal.send-by-email'])
@endsection

@section('after_scripts')
    @parent
    <script>
        /* Favorites Translation */
		var lang = {
			labelSavePostSave: "{!! t('Save Job') !!}",
			labelSavePostRemove: "{{ t('Saved Job') }}",
			loginToSavePost: "{!! t('Please log in to save the Ads') !!}",
			loginToSaveSearch: "{!! t('Please log in to save your search') !!}",
			confirmationSavePost: "{!! t('Post saved in favorites successfully') !!}",
			confirmationRemoveSavePost: "{!! t('Post deleted from favorites successfully') !!}",
			confirmationSaveSearch: "{!! t('Search saved successfully') !!}",
			confirmationRemoveSaveSearch: "{!! t('Search deleted successfully') !!}"
		};
		
		$(document).ready(function ()
		{
            /* Get Post ID */
			$('.email-job').click(function(){
                let postId = $(this).attr("data-id");
				$('input[type=hidden][name=post_id]').val(postId);
			});
			
			@if (isset($errors) && $errors->any())
				@if (old('sendByEmailForm')=='1')
                    $('#sendByEmail').modal();
                @endif
            @endif
		});
    </script>
@endsection