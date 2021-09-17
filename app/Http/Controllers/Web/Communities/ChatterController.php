<?php

namespace App\Http\Controllers\Web\Communities;

use Auth , DB;
use App\Helpers\ArrayHelper;
use App\Helpers\UrlGen;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Chatter_Models;
use App\Models\Chatter_Discussion;
use App\Models\Chatter_Category;
use App\Models\Chatter_Discussion_Vote;

use App\Http\Controllers\Web\FrontController;
use Torann\LaravelMetaTags\Facades\MetaTag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

use Validator;  
use App\Helpers\Response as R;
class ChatterController extends FrontController
{
    public function index(Request $request, $slug = '')
    {
        $pagination_results = config('chatter.paginate.num_of_results');
        $filter = $request->query('filter');

        $discussions = Chatter_Discussion::with([
            'user',
            'post',
            'postsCount',
            'votesCount',
            'votes',
            'lastpost.user',
            'category',
        ])
            ->sortable()
            ->where('chatter_discussion.title', 'like', '%' . $filter . '%')
            ->paginate($pagination_results)->onEachSide(2);

        $category_id = 0;
        if (isset($slug)) {
            $category = Chatter_Category::where('slug', '=', $slug)->first();
            if (isset($category->id)) {
                $discussions = Chatter_Discussion::with([
                    'user',
                    'post',
                    'postsCount',
                    'votesCount',
                    'lastpost.user',
                    'category',
                ])
                    ->where('chatter_category_id', '=', $category->id)
                    ->sortable()
                    ->where(
                        'chatter_discussion.title',
                        'like',
                        '%' . $filter . '%'
                    )
                    ->paginate($pagination_results)->onEachSide(2);
                $category_id = $category->id;
            }
        }

        $categories = Chatter_Category::all();
        $chatter_editor = config('chatter.editor');

        // Dynamically register markdown service provider
        \App::register('GrahamCampbell\Markdown\MarkdownServiceProvider');

        return view(
            'communities.home',
            compact(
                'discussions',
                'categories',
                'chatter_editor',
                'slug',
                'filter',
                'category_id'
            )
        );
    }

    public function vote(Request $request)
    {
        $inputs = $request->all();
        if (!Auth::check()) {
            return R::SimpleError('You have to login');
        }

        $validator = Validator::make($inputs, [
            'discussion_id' => 'required|numeric'
        ]);
        
        if ($validator->fails()) {
            return R::SimpleError($validator->errors());
        }
       
        $voter = Chatter_Discussion_Vote::where('chatter_discussion_id', $inputs['discussion_id'])
            ->where('user_id', Auth::id())
            ->first();
    
        if (empty($voter) && $voter == null) {
            $vote_set = [
                'chatter_discussion_id' => $inputs['discussion_id'],
                'user_id' => Auth::id(),
            ];

            DB::beginTransaction();
            try {
                $post = Chatter_Discussion_Vote::create($vote_set);
                DB::commit();
                return R::Success(__('Success'));
            } catch (Exception $e) {
                DB::rollback();
                return R::SimpleError("Can't set vote");
            }
        } else {
            return R::SimpleError('You have already voted.');
           
        }
            

    }

    public function login()
    {
        if (!Auth::check()) {
            return \Redirect::to(
                '/' .
                    config('chatter.routes.login') .
                    '?redirect=' .
                    config('chatter.routes.home')
            )->with(
                'flash_message',
                'Please create an account before posting.'
            );
        }
    }

    public function register()
    {
        if (!Auth::check()) {
            return \Redirect::to(
                '/' .
                    config('chatter.routes.register') .
                    '?redirect=' .
                    config('chatter.routes.home')
            )->with('flash_message', 'Please register for an account.');
        }
    }
}
