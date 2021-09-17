<?php
// Keywords
$keywords = rawurldecode(request()->input('q'));
?>
<div class="container">
	<div class="search-row-wrapper">
		<div class="container">
			<form id="seach" name="search" action="{{ \App\Helpers\UrlGen::company() }}" method="GET">
				<div class="row m-0">
					<div class="col-sm-10">
						<input name="q" class="form-control keyword" type="text" placeholder="{{ t('company_name') }}" value="{{ $keywords }}">
					</div>
					
					<div class="col-sm-2">
						<button class="btn btn-block btn-primary"><i class="fa fa-search"></i></button>
					</div>
					{!! csrf_field() !!}
				</div>
			</form>
		</div>
	</div>
</div>