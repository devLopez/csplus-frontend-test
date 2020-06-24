<?php

namespace Spa\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Spa\Http\Controllers\Controller;
use Spa\Http\Requests\PostRequest;
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

    /**
     * @OA\Get(
     *     tags={"posts"},
     *     path="/api/v1/posts",
     *     description="Retorna os posts cadastroados para o associado",
     *     security={"bearer"},
     *     @OA\Response(response="200", description="Response Ok", @OA\JsonContent(
     *          @OA\Property(property="data", description="Response data",
     *              @OA\Property(property="posts", @OA\Items(ref="#/components/schemas/Post"))
     *          )
     *     ))
     * )
     */
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

    public function store(PostRequest $request)
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
