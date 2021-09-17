<?php

namespace App\Http\Controllers\Web\Communities;

use Auth, DB;
use Carbon\Carbon;
use App\Events\ChatterAfterNewResponse;
use App\Events\ChatterBeforeNewResponse;

use App\Models\Chatter_Category;
use App\Models\Chatter_Discussion;
use App\Models\Chatter_Discussion_Vote;
use App\Models\Chatter_Post;
use App\Models\Chatter_Post_Vote;

use App\Mail\ChatterDiscussionUpdated;

use Illuminate\Http\Request;
use App\Helpers\Response as R;
use App\Http\Controllers\Web\FrontController;
use Illuminate\Support\Facades\Mail;

use Validator;
use Event;

class ChatterPostController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total = 10;
        $offset = 0;
        if ($request->total) {
            $total = $request->total;
        }
        if ($request->offset) {
            $offset = $request->offset;
        }
        $posts = Chatter_Post::with('user')
            ->orderBy('created_at', 'DESC')
            ->take($total)
            ->offset($offset)
            ->get();

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stripped_tags_body = ['body' => strip_tags($request->body)];
        $validator = Validator::make($stripped_tags_body, [
            'body' => 'required|min:10',
        ]);
        $body = html_entity_decode($request->my_body);
        // Event::fire(new ChatterBeforeNewResponse($request, $validator));
        // if (function_exists('chatter_before_new_response')) {
        //     chatter_before_new_response($request, $validator);
        // }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if (config('chatter.security.limit_time_between_posts')) {
            if ($this->notEnoughTimeBetweenPosts()) {
                $minute_copy =
                    config('chatter.security.time_between_posts') == 1
                        ? ' minute'
                        : ' minutes';
                $chatter_alert = [
                    'chatter_alert_type' => 'danger',
                    'chatter_alert' =>
                        'In order to prevent spam, please allow at least ' .
                        config('chatter.security.time_between_posts') .
                        $minute_copy .
                        ' in between submitting content.',
                ];

                return back()
                    ->with($chatter_alert)
                    ->withInput();
            }
        }

        $post_data = [
            'chatter_discussion_id' =>  $request->chatter_discussion_id,
            'user_id' => Auth::id(),
            'body' => $body,
        ];

        if (config('chatter.editor') == 'simplemde'):
            $request->request->add(['markdown' => 1]);
        endif;

        
        $new_post = Chatter_Post::create($post_data);

        $discussion = Chatter_Discussion::find(
            $request->chatter_discussion_id
        );

        
        $category = Chatter_Category::find(
            $discussion->chatter_category_id
        );
        if (!isset($category->slug)) {
            $category = Chatter_Category::first();
        }

        if ($category->id) {
            // Event::fire(new ChatterAfterNewResponse($request));
            // if (function_exists('chatter_after_new_response')) {
            //     chatter_after_new_response($request);
            // }

            // if email notifications are enabled
            if ($discussion->email_notification) {
                // Send email notifications about new post
                
                $this->sendEmailNotifications($new_post->discussion);
            }

            $chatter_alert = [
                'chatter_alert_type' => 'success',
                'chatter_alert' =>
                    'Response successfully submitted to ' .
                    config('chatter.titles.discussion') .
                    '.',
            ];

            return redirect(
                '/' .
                    config('chatter.routes.home') .
                    '/' .
                    config('chatter.routes.discussion') .
                    '/' .
                    $category->slug .
                    '/' .
                    $discussion->slug
            )->with($chatter_alert);
        } else {
            $chatter_alert = [
                'chatter_alert_type' => 'danger',
                'chatter_alert' =>
                    'Sorry, there seems to have been a problem submitting your response.',
            ];

            return redirect(
                '/' .
                    config('chatter.routes.home') .
                    '/' .
                    config('chatter.routes.discussion') .
                    '/' .
                    $category->slug .
                    '/' .
                    $discussion->slug
            )->with($chatter_alert);
        }
    }

    private function notEnoughTimeBetweenPosts()
    {
        $user = Auth::user();

        $past = Carbon::now()->subMinutes(
            config('chatter.security.time_between_posts')
        );

        $last_post =Chatter_Post::where('user_id', '=', $user->id)
            ->where('created_at', '>=', $past)
            ->first();

        if (isset($last_post)) {
            return true;
        }

        return false;
    }

    private function sendEmailNotifications($discussion)
    {   
        $users= $discussion->user->email;
        Mail::to($users)->send(new ChatterDiscussionUpdated($discussion));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stripped_tags_body = ['body' => strip_tags($request->body)];
        $validator = Validator::make($stripped_tags_body, [
            'body' => 'required|min:10',
        ]);
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $body = html_entity_decode($request->my_body);
        
        $post = Chatter_Post::find($id);
        if (!Auth::guest() && (Auth::user()->about == 'Administrator')) {
            $post->body = $body;
            $post->save();

            $discussion = Chatter_Discussion::find(
                $post->chatter_discussion_id
            );

            $category = Chatter_Category::find(
                $discussion->chatter_category_id
            );
            if (!isset($category->slug)) {
                $category = Chatter_Category::first();
            }

            $chatter_alert = [
                'chatter_alert_type' => 'success',
                'chatter_alert' =>
                    'Successfully updated the ' .
                    config('chatter.titles.discussion') .
                    '.',
            ];

            return redirect(
                '/' .
                    config('chatter.routes.home') .
                    '/' .
                    config('chatter.routes.discussion') .
                    '/' .
                    $category->slug .
                    '/' .
                    $discussion->slug
            )->with($chatter_alert);
        } else {
            $chatter_alert = [
                'chatter_alert_type' => 'danger',
                'chatter_alert' =>
                    'Nah ah ah... Could not update your response. Make sure you\'re not doing anything shady.',
            ];

            return redirect('/' . config('chatter.routes.home'))->with(
                $chatter_alert
            );
        }
    }

    /**
     * Delete post.
     *
     * @param string $id
     * @param  \Illuminate\Http\Request
     *
     * @return \Illuminate\Routing\Redirect
     */
    public function destroy($id, Request $request)
    {
        $post = Chatter_Post::with('discussion')
            ->findOrFail($id);
  
        if (!Auth::user()->about == 'Administrator') {
            return redirect('/' . config('chatter.routes.home'))->with([
                'chatter_alert_type' => 'danger',
                'chatter_alert' =>
                    'Nah ah ah... Could not delete the response. Make sure you\'re not doing anything shady.',
            ]);
        }

        if (
            $post->discussion
                ->posts()
                ->oldest()
                ->first()->id === $post->id
        ) {
            $post->discussion->posts()->delete();
            $post->discussion()->delete();

            return redirect('/' . config('chatter.routes.home'))->with([
                'chatter_alert_type' => 'success',
                'chatter_alert' =>
                    'Successfully deleted the response and ' .
                    strtolower(config('chatter.titles.discussion')) .
                    '.',
            ]);
        }

        $post->delete();

        $url =
            '/' .
            config('chatter.routes.home') .
            '/' .
            config('chatter.routes.discussion') .
            '/' .
            $post->discussion->category->slug .
            '/' .
            $post->discussion->slug;

        return redirect($url)->with([
            'chatter_alert_type' => 'success',
            'chatter_alert' =>
                'Successfully deleted the response from the ' .
                config('chatter.titles.discussion') .
                '.',
        ]);
    }

    /**
     * emoji post.
     *
     * @param string $id
     * @param  \Illuminate\Http\Request
     *
     * @return \Illuminate\Routing\Redirect
     */
    public function set_emoji(Request $request)
    {
        
        $inputs = $request->all();
        if (!Auth::check()) {
            return R::SimpleError('You have to login');
        }
  
        $validator = Validator::make($inputs, [
            'post_id' => 'required|numeric',
            'emoji_type' => 'required|numeric|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return R::SimpleError($validator->errors());
        }
       
        $emoji_check = Chatter_Post_Vote::where('user_id', Auth::id())
            ->where('chatter_post_id', $inputs['post_id'])
            ->first();
            
        if (!empty($emoji_check) && !$emoji_check == null) {
            return R::SimpleError('You have already set emoji.');
        }

        $emoji_set = [
            'chatter_post_id' => $inputs['post_id'],
            'emoji_type' => $inputs['emoji_type'],
            'user_id' => Auth::id(),
        ];

        DB::beginTransaction();
        try {
            $post = Chatter_Post_Vote::create($emoji_set);
            DB::commit();
            return R::Success(__('Success'));
        } catch (Exception $e) {
            DB::rollback();
            return R::SimpleError("Can't set emoji");
        }
    }
}
