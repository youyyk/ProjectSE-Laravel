<div class="modal fade" id="createMenuModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ><b>เพิ่มเมนู</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="margin: auto">
                <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{--   Menu's Image   --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">เลือกรูปภาพ</label>
                        <div class="col-sm-5">
                            <input name="image" type="file" class="@error('image') @enderror">
                            @error('image') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    {{--   Menu's Name   --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ชื่อเมนู</label>
                        <div class="col-sm-5">
                            <input name="name" type="text" value="{{ old('name') }}"
                                   class="form-control text-center @error('name') border border-danger rounded @enderror"
                                   autocomplete="off">
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
                            <input name="price" type="number" min="1" value="{{ old('price') }}"
                                   class="form-control text-center @error('price') border border-danger rounded @enderror"
                                   placeholder="- - -  บาท - - -">
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
                            <input name="processTime" type="number" min="1" value="{{ old('processTime') }}"
                                   class="form-control text-center @error('processTime') border border-danger rounded @enderror"
                                   placeholder="- - -  นาที - - -">
                            @error('processTime') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    {{--    Category    --}}
                    <div class="mb-3 form-group row">
                        {{--  Dropdown later  --}}
                        <label class="col-sm-4 col-form-label" >ประเภท</label>
                        <div class="col-sm-5">
                            <select class="text-center bg rounded-1 form-select"
                                    style="width: 150px;"
                                    name="category" id="category">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->category }}"  {{ old('cat') === $cat->category ? "selected": "" }}>
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
                    {{--    Department's name    --}}
                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">แผนก</label>
                        <div class="col-sm-5">
                            <select class="text-center bg rounded-1 form-select @error('department_id') border border-danger rounded @enderror"
                                    style="width: 150px;"
                                    name="department_id" id="department_id">
                                @foreach($departments as $depart)
                                    <option value="{{ $depart->id }}" {{ old('depart') === $depart->id ? "selected": "" }}>
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

