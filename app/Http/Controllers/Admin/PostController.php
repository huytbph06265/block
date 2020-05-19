<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\models\Post;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;


class PostController extends Controller
{
    function __construct()

    {

        $this->middleware('permission:list post', ['only' => ['index', 'detail']]);

        $this->middleware('permission:add post', ['only' => ['create', 'store']]);

        $this->middleware('permission:edit post', ['only' => ['show', 'update']]);

        $this->middleware('permission:detroy post', ['only' => ['destroy']]);

        $this->post = new PostRepository();

    }


    public function index()
    {
        $this->user = new UserRepository();
        $this->cate = new CategoryRepository();
        $data['cateAll'] = $this->cate->getAll();
        $data['userAll'] = $this->user->getAll();
        return view('admin.post.list-post', $data);
    }

    public function postData(Request $request)
    {
        $totalRecord = Post::count();
        $s = $request->search['value'];

        $object = Post::with(['category', 'user'])
            ->where('is_delete', 0);
        if (!empty($s)) {
            $object = $object->searchPost($s);
        }
        $totalFillter = $object->count();
        $object = $object->orderBy('id', 'desc')->offset($request->start)->limit($request->length)->get()->toArray();
        $draw = $request->draw;
        $a = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecord,
            "recordsFiltered" => $totalFillter,
            "data" => $object
        );
        return json_encode($a);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->post = new PostRepository();
        $this->post = $this->post->store($request);
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function show($id)
    {
        $this->post = new PostRepository();
        $data = $this->post->show($id);
        return response()->json(['data'=> $data]);
    }

    public function update(Request $request, $id)
    {
        $this->post = new PostRepository();
        $this->post = $this->post->update($request, $id);
        return response()->json(['success' => 'Data']);
    }

    public function detroy($id)
    {
        $this->post = new PostRepository();
        $this->post = $this->post->destroy($id);
    }

    public function detail($id)
    {
        $this->post = new PostRepository();
        $data['post'] = $this->post->getPostDetail($id);
        return view('admin.post.detail-post', $data);
    }
}
