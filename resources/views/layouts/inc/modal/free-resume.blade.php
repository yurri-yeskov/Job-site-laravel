<div class="modal fade" id="freeResumeModal" tabindex="-1" role="dialog">
	<div class="modal-dialog  modal-sm">
		<div class="modal-content">
			
			<div class="modal-header">
				<!-- <h4 class="modal-title"><i class="icon-login fa"></i> {{ t('log_in') }} </h4> -->
				
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">{{ t('Close') }}</span>
				</button>
			</div>
			
			<div class="signup-wrap">
				<div class="modal-body">
					<div class="signup-heading">
						<img src="{{ asset('/images/site_logo.png') }}" title="" />
					</div>
					<!-- screen two -->
					<div class="social-signup-two">
						<div class="signup-heading">Would you like a FREE RESUME? </div>
						<form role="form" method="POST" action="">
							{!! csrf_field() !!}

							<!-- Button  -->
							<div class="form-group row mt-5 mb-5">
								<div class="col-md-12">
									<button type="button" id="freeResumePop" class="btn btn-custom btn-lg " rel="/friends/process/complete"> YES, I would a free resume <img src="{{ asset('/images/right-sign.png') }}" title=""  /></button>
								</div>
								<div class="col-md-12 mt-3 text-center resumeSkip">
				                    <a href="/friends/skip">Skip</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
