<?php

namespace App\Http\Controllers;

use App\Events\UpdateView;
use App\Http\Requests\ReportRequest;
use App\Jobs\UpdateViewJob;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function create()
    {
        $account = Account::where('id', Auth::id())->get();
        return view('report.create', compact('account'));
    }

    public function store(ReportRequest $request)
    {
        Post::create([
            'images' => $request->image,
            'category_id' => $request->danhmuc,
            'username' => $request->username,
            'uid' => $request->uid,
            'linkfb' => $request->link,
            'fullname' => $request->hovaten,
            'numberphone' => $request->sodienthoai,
            'numberbank' => $request->sotaikhoan,
            'namebank' => $request->nganhang,
            'content' => $request->noidung,
            'status' => $request->status,
            'account_id' => Auth::id(),
        ]);
    }

    public function show(int $id, Request $request)
    {
        $post = Post::findOrFail($id);
        $data = [
            'device' => $request->header('Sec-Ch-Ua-Mobile') == '?0' ? "Computer" : "Mobile",
            'platform' => $request->header('Sec-Ch-Ua-Platform'),
        ];
        UpdateViewJob::dispatch($id, $data);

        return view('report.show', compact('post'));
    }

    public function index(Request $request)
    {
        if (isset($request->search)) {
            $posts = Post::take(12)
                ->where('numberphone', $request->search)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $posts = Post::take(12)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('report.index', compact('posts'));
    }

    public function test(Request $request)
    {
        $check = [];
        $query = $request->search;
        $posts = Post::get('numberphone');
        foreach ($posts as $post) {
            $i = 0;
            $k = 0;
            $fail =0; 

            $postLetters = $this->removeVietnameseAccents(strtolower($post->numberphone));
            $arrHints = [];
            $arrHints2 = [];

            for ($j = 0; $j < strlen($postLetters) - 1; $j++) {
                $arrHints[] = substr($postLetters, $j, 2);
            }
            for ($j = 1; $j < strlen($postLetters) - 1; $j++) {
                $arrHints2[] = substr($postLetters, $j, 2);
            }

            foreach ($arrHints as $arrHint) {
                for ($j = 0; $j < strlen($query) - 1; $j++) {
                    if (substr($query, $j, 2)==$arrHint) {
                        $i++;
                        break;
                    }
                      
                }
            }
           

            foreach ($arrHints2 as $arrHint) {
                for ($j = 0; $j < strlen($query) - 1; $j++) {
                    
                    if (substr($query, $j, 2) == $arrHint) {
                        $k++;
                        break;
                    }
                }
               
            }
            if (($i >= 2 || $k>=2) && $fail<=4 ) {
                $check[] = ['number' => $i, 'hint' => $post->numberphone];
            }

        }


        // Sắp xếp từ cao xuống thấp
        usort($check, function ($a, $b) {
            return $b['number'] <=> $a['number'];
        });

        $check = array_slice($check, 0, 7);
        return response()->json($check);
    }

    public function loadMore(Request $request)
    {
        $offset = $request->offset;
        
        if (isset($request->search)) {
            $posts = Post::skip($offset)
                ->take(12)
                ->where('numberphone', $request->search)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $posts = Post::skip($offset)
                ->orderBy('id', 'desc')
                ->take(12)
                ->get();
        }




        foreach ($posts as $post) {
            $post = $posts->map(function ($post) {
                $post->views = $post->views($post->id);
                return $post;
            });
        }

        return response()->json($posts);
    }

    private function removeVietnameseAccents($str)
    {
        $accents = array(
            'à', 'á', 'ạ', 'ả', 'ã', 'â', 'ầ', 'ấ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ằ', 'ắ', 'ặ', 'ẳ', 'ẵ',
            'è', 'é', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ề', 'ế', 'ệ', 'ể', 'ễ',
            'ì', 'í', 'ị', 'ỉ', 'ĩ',
            'ò', 'ó', 'ọ', 'ỏ', 'õ', 'ô', 'ồ', 'ố', 'ộ', 'ổ', 'ỗ', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ',
            'ù', 'ú', 'ụ', 'ủ', 'ũ', 'ư', 'ừ', 'ứ', 'ự', 'ử', 'ữ',
            'ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ',
            'đ',

        );
        $noAccents = array(
            'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
            'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
            'i', 'i', 'i', 'i', 'i',
            'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
            'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
            'y', 'y', 'y', 'y', 'y',
            'd',

        );

        return str_replace($accents, $noAccents, $str);
    }
}
