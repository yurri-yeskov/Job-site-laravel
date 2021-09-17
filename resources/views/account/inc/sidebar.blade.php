<aside>
	<div class="inner-box">
		<div class="user-panel-sidebar">
            
            @if (isset($user))
                <div class="collapse-box">
                    <h5 class="collapse-title no-border">
                        {{ t('My Account') }}&nbsp;
                        <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a>
                    </h5>
                    <div class="panel-collapse collapse show" id="MyClassified">
                        <ul class="acc-list">
                            <li>
                                <a {!! ($pagePath=='') ? 'class="active"' : '' !!} href="{{ url('account') }}">
                                    <i class="icon-home"></i> {{ t('Personal Home') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.collapse-box  -->
                
                @if (!empty($user->user_type_id) and $user->user_type_id != 0)
                    <div class="collapse-box">
                        <h5 class="collapse-title">
                            {{ t('my_ads') }}&nbsp;
                            <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a>
                        </h5>
                        <div class="panel-collapse collapse show" id="MyAds">
                            <ul class="acc-list">
                                <!-- COMPANY -->
                                @if (in_array($user->user_type_id, [1]))
                                    <li>
                                        <a{!! ($pagePath=='companies') ? ' class="active"' : '' !!} href="{{ url('account/companies') }}">
                                        <i class="icon-town-hall"></i> {{ t('My companies') }}&nbsp;
                                        <span class="badge badge-pill">
											{{ isset($countCompanies) ? \App\Helpers\Number::short($countCompanies) : 0 }}
										</span>
                                        </a>
                                    </li>
									<li>
										<a{!! ($pagePath=='my-posts') ? ' class="active"' : '' !!} href="{{ url('account/my-posts') }}">
										<i class="icon-docs"></i> {{ t('my_ads') }}&nbsp;
										<span class="badge badge-pill">
											{{ isset($countMyPosts) ? \App\Helpers\Number::short($countMyPosts) : 0 }}
										</span>
										</a>
									</li>
                                    <li>
                                        <a{!! ($pagePath=='pending-approval') ? ' class="active"' : '' !!} href="{{ url('account/pending-approval') }}">
                                        <i class="icon-hourglass"></i> {{ t('pending_approval') }}&nbsp;
                                        <span class="badge badge-pill">
											{{ isset($countPendingPosts) ? \App\Helpers\Number::short($countPendingPosts) : 0 }}
										</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a{!! ($pagePath=='archived') ? ' class="active"' : '' !!} href="{{ url('account/archived') }}">
                                        <i class="icon-folder-close"></i> {{ t('archived_ads') }}&nbsp;
                                        <span class="badge badge-pill">
											{{ isset($countArchivedPosts) ? \App\Helpers\Number::short($countArchivedPosts) : 0 }}
										</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a{!! ($pagePath=='messenger') ? ' class="active"' : '' !!} href="{{ url('account/messages') }}">
                                        <i class="icon-mail-1"></i> {{ t('messenger') }}&nbsp;
										<span class="badge badge-pill count-threads-with-new-messages hide">0</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a{!! ($pagePath=='transactions') ? ' class="active"' : '' !!} href="{{ url('account/transactions') }}">
                                        <i class="icon-money"></i> {{ t('Transactions') }}&nbsp;
                                        <span class="badge badge-pill">
											{{ isset($countTransactions) ? \App\Helpers\Number::short($countTransactions) : 0 }}
										</span>
                                        </a>
                                    </li>
                                @endif
								<!-- CANDIDATE -->
                                @if (in_array($user->user_type_id, [2]))
									<li>
										<a{!! ($pagePath=='resumes') ? ' class="active"' : '' !!} href="{{ url('account/resumes') }}">
										<i class="icon-attach"></i> {{ t('My resumes') }}&nbsp;
										<span class="badge badge-pill">
											{{ isset($countResumes) ? \App\Helpers\Number::short($countResumes) : 0 }}
										</span>
										</a>
									</li>
                                    <li>
                                        <a{!! ($pagePath=='favourite') ? ' class="active"' : '' !!} href="{{ url('account/favourite') }}">
                                        <i class="icon-heart"></i> {{ t('Favourite jobs') }}&nbsp;
                                        <span class="badge badge-pill">
											{{ isset($countFavouritePosts) ? \App\Helpers\Number::short($countFavouritePosts) : 0 }}
										</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a{!! ($pagePath=='saved-search') ? ' class="active"' : '' !!} href="{{ url('account/saved-search') }}">
                                        <i class="icon-star-circled"></i> {{ t('Saved searches') }}&nbsp;
                                        <span class="badge badge-pill">
											{{ isset($countSavedSearch) ? \App\Helpers\Number::short($countSavedSearch) : 0 }}
										</span>
                                        </a>
                                    </li>
									<li>
										<a{!! ($pagePath=='messenger') ? ' class="active"' : '' !!} href="{{ url('account/messages') }}">
										<i class="icon-mail-1"></i> {{ t('messenger') }}&nbsp;
										<span class="badge badge-important count-threads-with-new-messages">0</span>
										</a>
									</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- /.collapse-box  -->
                
                    <div class="collapse-box">
                        <h5 class="collapse-title">
                            {{ t('Terminate Account') }}&nbsp;
                            <a href="#TerminateAccount" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a>
                        </h5>
                        <div class="panel-collapse collapse show" id="TerminateAccount">
                            <ul class="acc-list">
                                <li>
                                    <a {!! ($pagePath=='close') ? 'class="active"' : '' !!} href="{{ url('account/close') }}">
                                        <i class="icon-cancel-circled "></i> {{ t('Close account') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.collapse-box  -->
                @endif
            @endif

		</div>
	</div>
	<!-- /.inner-box  -->
</aside>