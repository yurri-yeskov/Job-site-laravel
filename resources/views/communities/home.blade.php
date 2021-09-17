{{-- @extends(Config::get('chatter.master_file_extend')) --}}
@extends(Config::get('chatter.master_file_extend'))
@section(Config::get('chatter.yields.head'))
	{{-- <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> --}}
    <link href="/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.css" rel="stylesheet">
	<link href="/vendor/devdojo/chatter/assets/css/chatter.css" rel="stylesheet">
	
	@if($chatter_editor == 'simplemde')
		<link href="/vendor/devdojo/chatter/assets/css/simplemde.min.css" rel="stylesheet">
	@endif
	
@stop

@section('content')

	<div id="chatter" class="chatter_home">

		<div id="chatter_hero">
			<div id="chatter_hero_dimmer"></div>
			<?php $headline_logo = Config::get('chatter.headline_logo'); ?>
			@if( isset( $headline_logo ) && !empty( $headline_logo ) )
				<img src="{{ Config::get('chatter.headline_logo') }}">
			@else
				<h1>{{ Config::get('chatter.headline') }}</h1>
				<p>{{ Config::get('chatter.description') }}</p>
			@endif
		</div>

		@if(Session::has('chatter_alert'))
			<div class="chatter-alert alert alert-{{ Session::get('chatter_alert_type') }}">
				<div class="container">
					<strong><i class="chatter-alert-{{ Session::get('chatter_alert_type') }}"></i> {{ Config::get('chatter.alert_messages.' . Session::get('chatter_alert_type')) }}</strong>
					{{ Session::get('chatter_alert') }}
					<i class="chatter-close"></i>
				</div>
			</div>
			<div class="chatter-alert-spacer"></div>
		@endif

		@if (count($errors) > 0)
			<div class="chatter-alert alert alert-danger">
				<div class="container">
					<p><strong><i class="chatter-alert-danger"></i> {{ Config::get('chatter.alert_messages.danger') }}</strong> Please fix the following errors:</p>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif

		<div class="container chatter_container">
			<div class="row" style="margin-bottom: 10px; justify-content: flex-end;">
				<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
					<li class="breadcrumb-item"><a href="/" style="color: #74788D">Home</a></li>
					<li class="breadcrumb-item active">{{ trans('community.communities') }}</li>
				</ol>

			</div>
			
			<div class="row" style="justify-content: space-between;">
				<div class="col-md-3 left-column">
					<!-- SIDEBAR -->
					<div class="chatter_sidebar">
						<form  method="GET" action="/{{ Config::get('chatter.routes.home') }}">
							<div class="form-group has-search" >
								<input type="text" class="form-control" placeholder="Search..." value="{{$filter}}"  style="border: 1px solid #ccc; border-radius: 30px;" id="filter" name="filter" for="filter">
								<span class="fa fa-search form-control-feedback" style="top: 10px; right:30px"  ></span>
							</div>
						
						</form>
						
						
						<p> Topics </p>
						<a href="/{{ Config::get('chatter.routes.home') }}">{{ trans('community.all_discussions') }}</a>
						<ul class="nav nav-pills nav-stacked">
							<?php $categories = App\Models\Chatter_Models::category()->all(); ?>
							@foreach($categories as $category)
								<li>
									<a href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.category') }}/{{ $category->slug }}">
										{{-- <div class="chatter-box" ></div>  --}}
										<span style="background-color:{{ $category->color }}" class="chatter-topic">{{ $category->name }}</span>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<!-- END SIDEBAR -->
				</div>
				<div class="col-md-8 right-column" style="padding: 0px">
					<div class="panel" style="padding: 0px 10px">
						<p class="feature-requests">
							{{ trans('community.summary_1.title') }}
						</p>
						<p class="panel-title">
							{{ trans('community.summary_1.content_1') }}
						</p>
						<p class="panel-title">
							{{ trans('community.summary_1.content_2') }} 
						</p>
						<p class="panel-title">
							{{ trans('community.summary_1.content_3') }} 
						</p>
					</div>
					<div class="panel" style="padding: 0px 10px">
						@if($slug == '')
							<button class="btn btn-success new_feature_btn" id="new_feature_btn" ><i class="far fa-thumbs-up"></i>&nbsp; {{ Config::get('chatter.titles.request-feature') }}</button> 
							<button class="btn btn-success new_feature_btn" id="new_discussion_btn"><i class="fas fa-microphone"></i>&nbsp;  {{ Config::get('chatter.titles.ask-question') }}</button> 
						@elseif($slug == 'new-feature')
							<button class="btn btn-success new_feature_btn" id="new_feature_btn"><i class="far fa-thumbs-up"></i>&nbsp;  {{ Config::get('chatter.titles.request-feature') }}</button>
						@else	
							<button class="btn btn-success new_feature_btn" id="new_discussion_btn" ><i class="fas fa-microphone"></i>&nbsp;  {{ Config::get('chatter.titles.ask-question') }}</button> 
						@endif
					</div>
					<div class="panel">
						<div class='page-tap'>
							<div  style="padding: 10px">
								<span>Sort by</span> &nbsp;
								<span class="sortable-span">
									@sortablelink('created_at','Recent')
								</span>
								
							</div>
							<div id="pagination" >
								{{ $discussions->appends(\Request::except('page'))->links('vendor.pagination.custom') }}
							</div>
						
						</div>
						<ul class="discussions">
							@if ($discussions->count() == 0)
							<li style="text-align: center">
								{{ trans('community.no_discussions') }}
							</li>
							@endif
							@foreach($discussions as $discussion)
								<li class="row">
									<div class="col-sm-9" style="padding: 0px">
										<a class="discussion_list" href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $discussion->category->slug }}/{{ $discussion->slug }}">
											<div class="chatter_avatar">
												@if(Config::get('chatter.user.avatar_image_database_field'))
													
													<?php $db_field = Config::get('chatter.user.avatar_image_database_field'); ?>
													
													<!-- If the user db field contains http:// or https:// we don't need to use the relative path to the image assets -->
													@if( (substr($discussion->user->{$db_field}, 0, 7) == 'http://') || (substr($discussion->user->{$db_field}, 0, 8) == 'https://') )
														<img src="{{ $discussion->user->{$db_field}  }}">
													@else
														<img src="{{ Config::get('chatter.user.relative_url_to_image_assets') . $discussion->user->{$db_field}  }}">
													@endif
												
												@else
													
													<span class="chatter_avatar_circle" style="background-color:#<?= \App\Helpers\ChatterHelper::stringToColorCode($discussion->user->email) ?>">
														{{ strtoupper(substr($discussion->user->email, 0, 1)) }}
													</span>
													
												@endif
											</div>
											<div class="chatter_middle">
												<h3 class="chatter_middle_title" style="display:flex">
													<span style="margin-right: 10px; word-break: break-word; font-family:'Open Sans';">{{ $discussion->title }}</span>
														<div class="view_count" style="margin-right: 10px"><i class="far fa-eye"></i> {{ $discussion->views }}</div>
														<div class="chatter_count" style="margin-right: 10px"><i class="far fa-comment-alt"></i> {{ $discussion->postsCount[0]->total }}</div>
														<div class="chatter_cat" style="background-color:{{ $discussion->category->color }}">{{ $discussion->category->name }}</div>
												</h3>
												<span class="chatter_middle_details">Posted By: <span data-href="/user" style="color: #34C38F;">{{ ucfirst($discussion->user->{Config::get('chatter.user.database_field_with_user_name')}) }}</span> </span>	• <span class="chatter_middle_details" style="font-size: 13px"> <span data-href="/user" style="color: #34C38F;">{{ ucfirst($discussion->lastpost->user->{Config::get('chatter.user.database_field_with_user_name')}) }} replied</span> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($discussion->lastpost->created_at))->diffForHumans() }}</span>
											</div>
										</a>
									</div>
									@if($discussion->category->id  == 1)
									<div class="col-sm-3" style="text-align: right;padding: 0px">
										<a data-id={{$discussion->id}}  type="button"  class="btn btn-success vote_btn"><i class="far fa-thumbs-up"></i>&nbsp; <span>@if(count($discussion->votesCount)>0) {{ $discussion->votesCount[0]->total }} @else 0  @endif </span></a>
									</div>
									@endif
								</li>
							@endforeach
						</ul>
					</div>

					<div id="pagination" >
						{{ $discussions->appends(\Request::except('page'))->onEachSide(2)->links('vendor.pagination.custom') }}
					</div>

				</div>
			</div>
		</div>

		<div id="new_discussion">
			<div class="chatter_loader dark" id="new_discussion_loader">
				<div></div>
			</div>

			<form id="chatter_form_editor" action="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}" method="POST">
				<div class="row">
					<div class="col-md-7">
						<!-- TITLE -->
						<input type="text" class="form-control" id="title" name="title" placeholder="Title of {{ Config::get('chatter.titles.discussion') }}" v-model="title" @if (count($errors) > 0) value="{{ old('title') }}" @endif>
					</div>

					<div class="col-md-4" style="line-height: 35px;">
						<!-- CATEGORY -->
						@if($category_id ==0) 
							<select id="chatter_category_id" class="form-control" name="chatter_category_id">
								<option value="">Select a Category</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" @if($category->id ==1) style="display:none" @endif><i class="far fa-thumbs-up"></i>{{ $category->name }}</option>
								@endforeach
							</select>
							@foreach($categories as $category)
								@if($category->id == 1 )
									<span style="background-color:{{ $category->color }};vertical-align: bottom;display:none" class="chatter-topic" id="chatter_category_id_span" >{{ $category->name }}</span>
								@endif
							@endforeach
						@else
							
							@foreach($categories as $category)
								@if($category_id == $category->id )
									<input type="hidden" name="chatter_category_id" id="chatter_category_id"  value="{{$category->id}}">
									<span style="background-color:{{ $category->color }};vertical-align: bottom;" class="chatter-topic">{{ $category->name }}</span>
								@endif
							@endforeach
						@endif
					</div>
					

					<div class="col-md-1">
						<i class="chatter-close"></i>
					</div>	
				</div><!-- .row -->

				<!-- BODY -->
				<div id="editor">
					
					@if( $chatter_editor == 'tinymce' || empty($chatter_editor) )
						<label id="tinymce_placeholder">Add the content for your Discussion here</label>
						<textarea id="body" class="richText" name="body" placeholder="">@if (count($errors) > 0) {{ old('body') }} @endif</textarea>

					@elseif($chatter_editor == 'simplemde')
		
						<textarea id="simplemde" name="body" placeholder=""></textarea>
					@endif
				</div>
				<input type="hidden" id="my_body" name="my_body">
				<input type="hidden" name="_token" id="csrf_token_field" value="{{ csrf_token() }}">

				<div id="discussion_response_email" style="display: flex; padding:10px;flex-direction: column;">
					<p>Email Updates </p>
					@if(Config::get('chatter.email.enabled'))
						<div>
							<input type="checkbox" id="email_notification" name="email_notification" value="1" >
							<span>I would like to receive email updates about this discussion.</span>
						</div>
					@endif
				</div>
				<div id="new_discussion_footer">
					{{-- <input type='text' id="color" name="color" /><span class="select_color_text">Select a Color for this Discussion (optional)</span> --}}
					<button type="button" id="submit_discussion" class="btn btn-success pull-right" style="background-color:#556EE6; border-radius: 5px; margin-right:10px" ><i class="fa fa-save"></i>&nbsp;Save Changes</button>
					<button type="button"  class="btn btn-success pull-right" id="cancel_discussion" style="background-color:#74788D; border-radius: 5px; margin-right:10px">Cancel</button>
					<div style="clear:both"></div>
				</div>
			</form>

		</div><!-- #new_discussion -->

	</div>

	@if( $chatter_editor == 'tinymce' || empty($chatter_editor) )
		<input type="hidden" id="chatter_tinymce_toolbar" value="{{ Config::get('chatter.tinymce.toolbar') }}">
		<input type="hidden" id="chatter_tinymce_plugins" value="{{ Config::get('chatter.tinymce.plugins') }}">
	@endif

	<input type="hidden" id="current_path" value="{{ Request::path() }}">

	
@endsection

@section(Config::get('chatter.yields.footer'))


	@if( $chatter_editor == 'tinymce' || empty($chatter_editor) )
		<script src="/vendor/devdojo/chatter/assets/vendor/tinymce/tinymce.min.js"></script>
		<script src="/vendor/devdojo/chatter/assets/js/tinymce.js"></script>
		<script>
			var my_tinymce = tinyMCE;
			$('document').ready(function(){
				$('#tinymce_placeholder').click(function(){
					my_tinymce.activeEditor.focus();
				});
				
			});
		</script>
	@elseif($chatter_editor == 'simplemde')
		<script src="/vendor/devdojo/chatter/assets/js/simplemde.min.js"></script>
		<script src="/vendor/devdojo/chatter/assets/js/chatter_simplemde.js"></script>
	@endif

	<script src="/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.js"></script>
	<script src="/vendor/devdojo/chatter/assets/js/chatter.js"></script>
	<script>
		$('document').ready(function(){
			PNotify.prototype.options.styling = "bootstrap3";
			$('.chatter-close').click(function(){
				$('#new_discussion').slideUp();
			});

			$('#new_feature_btn').click(function(){
				@if(Auth::guest())
					$("#quickSignupAll").modal('show');
					
				@else
			
					@if($category_id ==0) 
						$('#chatter_category_id').css('display','none');
						$('#chatter_category_id_span').css('display','initial');
						$('#chatter_category_id').val(1);
					@endif
					$('#new_discussion').slideDown();
					$('#title').focus();
				@endif
			});

			$('#new_discussion_btn').click(function(){
				@if(Auth::guest())
					$("#quickSignupAll").modal('show');
					
				@else
					@if($category_id ==0) 
						$('#chatter_category_id').css('display','block');
						$('#chatter_category_id_span').css('display','none');
					@endif
					$('#new_discussion').slideDown();
					$('#title').focus();
				@endif
			});

			$('#cancel_discussion').click(function(){
				$('#new_discussion').slideUp();
				$('#title').val('');
				$('#chatter_category_id').val('');
				tinymce.activeEditor.setContent("");
 			});

			$('#submit_discussion').click(function(){
				tinymce.activeEditor.dom.remove(tinymce.activeEditor.dom.select('.bootstrapiso'));
				var html_str = tinymce.activeEditor.getContent();

				var title = $("#title").val();
				var category = $("#chatter_category_id").val();
		
				if((title =="")||(title ==undefined)){
					new PNotify({
									text: "The title field is required.",
									type: "error"
						});
					$('#title').focus();
					return;
				}

				if(title.length<5){
					new PNotify({
									text: "The title must be at least 5 characters.",
									type: "error"
						});
					$('#title').focus();
					return;
				}

				if((category =="")||(category ==undefined)){
					new PNotify({
									text: "The category id field is required.",
									type: "error"
						});
					$('#chatter_category_id').focus();
					return;
				}
				
				if((html_str =="")){
					new PNotify({
									text: "The body content field is required.",
									type: "error"
						});
						return;
				}
				
				$('#my_body').val(htmlEntities(html_str));

				$("#chatter_form_editor").submit();
			})

			function htmlEntities(str) {
				return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
			}	
			
			
			$("#color").spectrum({
				color: "#333639",
				preferredFormat: "hex",
				containerClassName: 'chatter-color-picker',
				cancelText: '',
				chooseText: 'close',
				move: function(color) {
					$("#color").val(color.toHexString());
				}
			});

			@if (count($errors) > 0)
				$('#new_discussion').slideDown();
				$('#title').focus();
			@endif


			$('.vote_btn').click(function(){

				var discussion_id = $(this).data('id');
				var span = $(this).find('span');
				var vote_cnt = span.html();
		
				$.ajax( {
					url:'/{{ Config::get('chatter.routes.home') }}/vote',
					method: "POST",
					data:{
						'discussion_id' : discussion_id,
					},
					success:function(resp) {
						if (resp.success === false) {
							new PNotify({
									text: resp.errors.general,
									type: "error"
							});
						} else {
							span.html(parseInt(vote_cnt)+1);
						}
					}
				});

		})


		});
	</script>
@stop

