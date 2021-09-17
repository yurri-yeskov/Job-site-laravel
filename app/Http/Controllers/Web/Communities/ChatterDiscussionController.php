<?php

namespace App\Http\Controllers\Web\Communities;

use Auth, DB;
use Carbon\Carbon;
use App\Events\ChatterAfterNewDiscussion;
use App\Events\ChatterBeforeNewDiscussion;
use App\Models\Chatter_Models;
use App\Models\Chatter_Discussion;
use App\Models\Chatter_Post;
use App\Models\Chatter_Category;
use Illuminate\Http\Request;
use App\Helpers\Response as R;
use App\Http\Controllers\Web\FrontController;
use Event;
use Validator;


class ChatterDiscussionController extends FrontController
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
        $discussions = Chatter_Discussion::with('user')
            ->with('post')
            ->with('postsCount')
            ->with('category')
            ->orderBy('created_at', 'ASC')
            ->take($total)
            ->offset($offset)
            ->get();

        return response()->json($discussions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Chatter_Category::all();

        return view('chatter::discussion.create', compact('categories'));
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
        $request->request->add(['body_content' => strip_tags($request->body)]);
   
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body_content' => 'required|min:10',
            'chatter_category_id' => 'required|numeric',
            'email_notification' =>'nullable|numeric'
        ]);
        
        $body = html_entity_decode($request->my_body);

        // Event::fire(new ChatterBeforeNewDiscussion($request, $validator));
        // if (function_exists('chatter_before_new_discussion')) {
        //     chatter_before_new_discussion($request, $validator);
        // }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_id = Auth::id();

        if (config('chatter.security.limit_time_between_posts')) {
            if ($this->notEnoughTimeBetweenDiscussion()) {
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

                return redirect('/' . config('chatter.routes.home'))
                    ->with($chatter_alert)
                    ->withInput();
            }
        }

        // *** Let's gaurantee that we always have a generic slug *** //
        $slug = str_slug($request->title, '-');

        $discussion_exists = Chatter_Discussion::where(
            'slug',
            '=',
            $slug
        )->first();
        $incrementer = 1;
        $new_slug = $slug;
        while (isset($discussion_exists->id)) {
            $new_slug = $slug . '-' . $incrementer;
            $discussion_exists = Chatter_Discussion::where(
                'slug',
                '=',
                $new_slug
            )->first();
            $incrementer += 1;
        }

        if ($slug != $new_slug) {
            $slug = $new_slug;
        }

        $new_discussion = [
            'title' => $request->title,
            'chatter_category_id' => $request->chatter_category_id,
            'user_id' => $user_id,
            'slug' => $slug,
            'color' => $request->color,
            'email_notification' =>$request->email_notification
        ];

        $category = Chatter_Category::find($request->chatter_category_id);
        if (!isset($category->slug)) {
            $category = Chatter_Category::first();
        }

        $discussion = Chatter_Discussion::create($new_discussion);

        $new_post = [
            'chatter_discussion_id' => $discussion->id,
            'user_id' => $user_id,
            'body' => $body,
        ];

        if (config('chatter.editor') == 'simplemde'):
            $new_post['markdown'] = 1;
        endif;

        // add the user to automatically be notified when new posts are submitted
        $discussion->users()->attach($user_id);

        $post = Chatter_Post::create($new_post);
        
        if ($post->id) {
            // Event::fire(new ChatterAfterNewDiscussion($request));
            // if (function_exists('chatter_after_new_discussion')) {
            //     chatter_after_new_discussion($request);
            // }

            $chatter_alert = [
                'chatter_alert_type' => 'success',
                'chatter_alert' =>
                    'Successfully created a new ' .
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
                    $slug
            )->with($chatter_alert);
        } else {
            $chatter_alert = [
                'chatter_alert_type' => 'danger',
                'chatter_alert' =>
                    'Whoops :( There seems to be a problem creating your ' .
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
                    $slug
            )->with($chatter_alert);
        }
    }

    private function notEnoughTimeBetweenDiscussion()
    {
        $user = Auth::user();

        $past = Carbon::now()->subMinutes(
            config('chatter.security.time_between_posts')
        );

        $last_discussion = Chatter_Discussion::where('user_id', '=', $user->id)
            ->where('created_at', '>=', $past)
            ->first();

        if (isset($last_discussion)) {
            return true;
        }

        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug = null)
    {
        if (!isset($category) || !isset($slug)) {
            return redirect(config('chatter.routes.home'));
        }

        $discussion = Chatter_Discussion::with('category')
            ->where('slug', '=', $slug)
            ->first();
        if (is_null($discussion)) {
            abort(404);
        }

        $discussion->views += 1;
        $discussion->save();

        $categories = Chatter_Category::all();
        $discussion_category = Chatter_Category::find(
            $discussion->chatter_category_id
        );
        if ($category != $discussion_category->slug) {
            return redirect(
                config('chatter.routes.home') .
                    '/' .
                    config('chatter.routes.discussion') .
                    '/' .
                    $discussion_category->slug .
                    '/' .
                    $discussion->slug
            );
        }
        $posts = Chatter_Post::with(['user','votesCount'])
            ->where('chatter_discussion_id', '=', $discussion->id)
            ->orderBy('created_at', 'ASC')
            ->paginate(10);

        $chatter_editor = config('chatter.editor');

        // Dynamically register markdown service provider
        \App::register('GrahamCampbell\Markdown\MarkdownServiceProvider');
     
        return view(
            'communities.discussion',
            compact('discussion', 'posts', 'chatter_editor', 'categories')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function sanitizeContent($content)
    {
        libxml_use_internal_errors(true);
        // create a new DomDocument object
        $doc = new \DOMDocument();

        // load the HTML into the DomDocument object (this would be your source HTML)
        $doc->loadHTML($content);

        $this->removeElementsByTagName('script', $doc);
        $this->removeElementsByTagName('style', $doc);
        $this->removeElementsByTagName('link', $doc);

        // output cleaned html
        return $doc->saveHtml();
    }

    private function removeElementsByTagName($tagName, $document)
    {
        $nodeList = $document->getElementsByTagName($tagName);
        for ($nodeIdx = $nodeList->length; --$nodeIdx >= 0; ) {
            $node = $nodeList->item($nodeIdx);
            $node->parentNode->removeChild($node);
        }
    }

    public function toggleEmailNotification($category, $slug = null)
    {
        if (!isset($category) || !isset($slug)) {
            return redirect(config('chatter.routes.home'));
        }

        $discussion = Chatter_Discussion::where('slug', '=', $slug)->first();

        $user_id = Auth::user()->id;

        // if it already exists, remove it
        if ($discussion->users->contains($user_id)) {
            $discussion->users()->detach($user_id);

            return response()->json(0);
        } else {
            // otherwise add it
            $discussion->users()->attach($user_id);

            return response()->json(1);
        }
    }
}
