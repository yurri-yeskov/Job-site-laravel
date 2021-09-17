<?php
/**
 *  Yurii- Yuskove
 
 */

namespace App\Http\Controllers\Admin;
use App\Models\Chatter_Category;
use App\Models\Chatter_Discussion;
use App\Models\Chatter_Discussion_Vote;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Larapen\Admin\app\Http\Controllers\PanelController;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Cache;
use Redirect;

class CommunityController extends PanelController
{
    public function index()
    {
        $category_list = Chatter_Category::all();

        $discussions = Chatter_Discussion::with([
            'user',
            'post',
            'postsCount',
            'votesCount',
            'lastpost.user',
            'category',
        ])->orderBy('created_at', 'Desc')
        ->get();

        return view(
            'vendor.admin.pages.community.list',
            compact('category_list', 'discussions')
        );
    }

    public function create_category()
    {
        return view('vendor.admin.pages.community.create_category');
    }

    // edit
    public function edit_category(Request $request)
    {
        $category = Chatter_Category::where('id', $request->id)->first();

        return view(
            'vendor.admin.pages.community.edit_category',
            compact('category')
        );
    }
    //insert new
    public function store_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|numeric|min:1',
            'name' => 'required|string|max:50',
            'color' => 'required',
        ]);

        if ($validator->passes()) {
            // If validation is empty inserting the post

            $slug = str_slug($request->name, '-');

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
            
            $values = [
                'order' => $request->order,
                'name' => $request->name,
                'slug' => $slug,
                'color' => $request->color,
            ];
            Chatter_Category::create($values);

            return redirect('/admin/community/')->with(
                'success',
                'New chatter category type added successfully.'
            );
        }

        return Redirect::back()->withErrors($validator->errors()->all());
    }

    public function update_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|numeric|min:1',
            'name' => 'required|string|max:50',
            'color' => 'required',
        ]);

        if ($validator->passes()) {
            $slug = str_slug($request->name, '-');

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

            Chatter_Category::where('id', $request->id)->update([
                'order' => $request->order,
                'name' => $request->name,
                'slug' =>  $slug,
                'color' => $request->color,
            ]);

            return redirect('/admin/community/')->with(
                'success',
                'Chatter category updated successfully.'
            );
        }
        return Redirect::back()->withErrors($validator->errors()->all());
    }

    public function delete_category(Request $request)
    {
        Chatter_Category::where('id', $request->id)->delete();

        return redirect('/admin/community')->with(
            'success',
            'Chatter Category deleted successfully.'
        );
    }

    public function delete_discussion(Request $request)
    {
        Chatter_Discussion::where('id', $request->id)->delete();

        return redirect('/admin/community')->with(
            'success',
            ' Discussion deleted successfully.'
        );
    }

    public function edit_discussion(Request $request)
    {
        $discussion = Chatter_Discussion::with([
            'user',
            'post',
            'postsCount',
            'votesCount',
            'lastpost.user',
            'category',
        ])->where('id',$request->id)
        ->first();

        $categories = Chatter_Category::all();

        return view(
            'vendor.admin.pages.community.edit_discussion',
            compact('discussion','categories')
        );
    }

    public function update_discussion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'discussion_id' => 'required|numeric',
            'chatter_category_id' => 'required|numeric',
            
        ]);

        if ($validator->passes()) {
            Chatter_Discussion::where('id', $request->discussion_id)->update([
                'chatter_category_id' => $request->chatter_category_id,
                'title' => $request->title,
            ]);

            return redirect('/admin/community/')->with(
                'success',
                'Discussion updated successfully.'
            );
        }
        return Redirect::back()->withErrors($validator->errors()->all());
    }
}
