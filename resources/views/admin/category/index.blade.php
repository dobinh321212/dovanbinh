@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            QL Danh Mục <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Thêm Danh Mục</a>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th >STT</th>
                                <th>Tên</th>
                                <th >Danh Mục Cha</th>
                                <th class="text-center">Hình ảnh</th>
                                <th class="text-center">Vị trí</th>
                                <th class="text-center">Loại Danh Mục</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            @foreach($data as $index => $item)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @foreach($categories as $cate)
                                            @if($item->parent_id === $cate->id)
                                                {{ $cate->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @if($item->image)
                                            <img width="100" src="{{ asset($item->image) }}">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->position }}</td>
                                    <td class="text-center">
                                        @if($item->type == 1)
                                            Sản phẩm
                                        @elseif($item->type == 2)
                                            Tin tức
                                        @else
                                            Khác
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {!! ($item->is_active == 1) ? '<span class="badge bg-green"> hiển thị </span>' : '<span class="badge bg-red">ẩn</span>'  !!}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.edit', ['id' => $item->id]) }}" class="btn btn-primary ">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a type="button" class="btn btn-danger btnDelete" data-id="{{$item-> id}}">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
{{--                    PHÂN TRANG--}}
                    <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

        </div>

    </section>
    <!-- /.content -->
@endsection

@section('my_js')
    <script type="text/javascript">
        $(document).ready(function() {

            // đính kèm token vào mỗi request ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // suAbidEneUPjfI5mHvWdFbSQ1PsM4OYSm73vF7kZ
                }
            });

            $('.btnDelete').click(function () {
                var id = $(this).attr('data-id'); // lấy thuộc tính của thẻ HTML
                var me = this;

                var result = confirm("Bạn có chắc chắn muốn xóa ?");
                if (result == true) { // neu nhấn == ok , sẽ send request ajax
                    $.ajax({
                        url: './category/'+id,
                        type: 'DELETE', // method
                        data: {}, // dữ liệu truyền sang nếu có
                        dataType: "json", // kiểu dữ liệu nhận về
                        success: function (res) { // success : kết quả trả về sau khi gửi request ajax
                            if (res.status == true) {
                                $(me).closest('tr').remove();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection

