<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all(); // lấy toàn bộ dữ liệu
        // gọi đến view
        return view('admin.banner.index', [
            'data' => $data // truyền dữ liệu sang view Index
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = Category::all(); // lấy toàn bộ dữ liệu

        return view('admin.banner.create',[
            'banners' => $banners
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate dữ liệu
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        // bước 1 : nhận được data từ request
        //$name = $_POST['name'];
        // Url
        $url = $request->input('url');
        // Target
        $target = $request->input('target');
        // Loại
        $type = $request->input('type');
        // Trạng thái
        $is_active = $request->input('is_active'); // hiển thị
        // Vị trí
        $position = $request->input('position');
        // Mô tả
        $description = $request->input('description');
        $title = $request->input('title');

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $banner = new Banner();

        $banner->title = $title;
        $banner->slug = str_slug($title);
//        $banner->parent_id = $parent_id;
        $banner->url = $url;
        $banner->target = $target;
        $banner->type = $type;
        $banner->is_active = $is_active ? $is_active : 0;
        $banner->position = $position;
        $banner->description = $description;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // tên file image
            $filename = $file->getClientOriginalName(); // tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload,$filename);

            $banner->image = $path_upload.$filename;
        }
        // Lưu
        $banner->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.admin.banner.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        $banners = Banner::all(); // lấy toàn bộ dữ liệu

        return view('admin.banner.edit',[
            'banner' => $banner,
            'banners' => $banners
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = $request->input('url');
        // Target
        $target = $request->input('target');
        // Loại
        $type = $request->input('type');
        // Trạng thái
        $is_active = $request->input('is_active'); // hiển thị
        // Vị trí
        $position = $request->input('position');
        // Mô tả
        $description = $request->input('description');
        $title = $request->input('title');

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $banner = Banner::find($id); // tên bảng =>  class

        $banner->title = $title;
        $banner->slug = str_slug($title);
//        $banner->parent_id = $parent_id;
        $banner->url = $url;
        $banner->target = $target;
        $banner->type = $type;
        $banner->is_active = $is_active ? $is_active : 0;
        $banner->position = $position;
        $banner->description = $description;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // tên file image
            $filename = $file->getClientOriginalName(); // tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload,$filename);

            $banner->image = $path_upload.$filename;
        }
        // Lưu
        $banner->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id); // DELETE FROM categories WHERE id = 56

        return response()->json(['status' => true], 200);
    }
}
