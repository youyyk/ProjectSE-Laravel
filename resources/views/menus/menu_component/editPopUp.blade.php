<div class="modal fade" id="editMenuModal{{$menu->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " >
        <div class="modal-content " class="w-100">
            <div class="modal-header">
                <h5 class="modal-title" ><b>แก้ไขเมนู</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                            <input name="name" type="text"
                                   class="form-control text-center @error('name') border border-danger rounded @enderror"
                                   value="{{$menu->name}}">
                            @error('name') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    {{--    Menu's Price    --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ราคา</label>
                        <div class="col-sm-5">
                            <input name="price" type="number"
                                   class="form-control text-center @error('price') border border-danger rounded @enderror"
                                   value="{{$menu->price}}">
                            @error('price') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    {{--    Cooking Time    --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ระยะเวลาการทำ</label>
                        <div class="col-sm-5">
                            <input name="processTime" type="number"
                                   class="form-control text-center @error('processTime') border border-danger rounded @enderror"
                                   value="{{$menu->processTime}}">
                            @error('processTime') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    {{--    Category    --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label" >ประเภท</label>
                        <div class="col-sm-5">
                            <select class="w-100 h-100 text-center bg rounded-1" name="category" id="category">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->category }}"{{$menu->category == $cat->category ? "selected" : ""}}>
                                        {{ $cat->category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    {{--Department's ID--}}
                    <div class="mb-5 form-group row">
                        {{--Connect to department's name later--}}
                        <label class="col-sm-4 col-form-label">แผนก</label>
                        <div class="col-sm-5">
                            <select class="w-100 h-100 text-center bg rounded-1" name="department_id" id="department_id">
                                @foreach($departments as $depart)
                                    <option value="{{ $depart->id }}"
                                        {{$menu->department_id == $depart->id ? "selected" : ""}}
                                    >
                                        {{ $depart->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <a href="{{route("menus.index")}}" >
                            <button type="submit" class="btn btn-primary w-100 mt-lg-3">
                                แก้ไข
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
