<?php

namespace Spa\Http\Controllers\Api\V1;

use Auth;
use Illuminate\Http\Request;
use Spa\Http\Controllers\Controller;
use Spa\Repositories\Posts;

/**
 * PostsController
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package Spa\Http\Controllers\Api\V1
 */
class PostsController extends Controller
{
    /**
     * @var Posts
     */
    protected $posts;

    public function __construct(Posts $posts)
    {
        $this->middleware('auth:api');
        $this->posts = $posts;
    }

    public function index()
    {
        $user = auth()->user();
        $posts = $this->posts->getUserPosts($user->id);

        return success([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
