<div class="modal fade" id="createMenuModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ><b>เพิ่มเมนู</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{--   Menu's Image   --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">เลือกรูปภาพ</label>
                        <div class="col-sm-5">
                            <input name="image" type="file">
                        </div>
                    </div>

                    {{--   Menu's Name   --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ชื่อเมนู</label>
                        <div class="col-sm-5">
                            <input name="name" type="text" class="form-control text-center" autocomplete="off">
                        </div>
                    </div>
                    {{--    Menu's Price    --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ราคา</label>
                        <div class="col-sm-5">
                            <input name="price" type="number" class="form-control text-center" placeholder="- - -  บาท - - -">
                        </div>
                    </div>
                    {{--    Cooking Time    --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ระยะเวลาการทำ</label>
                        <div class="col-sm-5">
                            <input name="processTime" type="number" class="form-control text-center" placeholder="- - -  นาที - - -">
                        </div>
                    </div>
                    {{--    Category    --}}
                    <div class="mb-3 form-group row">
                        {{--  Dropdown later  --}}
                        <label class="col-sm-4 col-form-label" >ประเภท</label>
                        <div class="col-sm-5">
                            <select class="w-100 h-100 text-center bg rounded-1" name="category" id="category">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->category }}">
                                        {{ $cat->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--    Department's name    --}}
                    <div class="mb-5 form-group row">
                        <label class="col-sm-4 col-form-label">แผนก</label>
                        <div class="col-sm-5">
                            <select class="w-100 h-100 text-center bg rounded-1" name="department_id" id="department_id">
                                @foreach($departments as $depart)
                                    <option value="{{ $depart->id }}">
                                        {{ $depart->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="{{route("menus.index")}}">
                        <button type="submit" class="btn btn-primary w-100 mt-lg-3">
                            + เพิ่มเมนู
                        </button>
                    </a>
                </form>
            </div>

        </div>
    </div>
</div>

