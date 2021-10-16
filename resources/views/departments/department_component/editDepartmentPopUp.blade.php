<div class="modal fade" id="editDepartmentModal{{$department->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " >
        <div class="modal-content " class="w-100">
            <div class="modal-header">
                <h5 class="modal-title" ><b>แก้ไขแผนก</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('departments.update', ['department' => $department->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{--   Department's Name   --}}
                    <div class="m-3 form-group row text-center">
                        <label class="col-sm-4 col-form-label">ชื่อแผนก</label>
                        <div class="col-sm-5">
                            <input name="name" type="text" class="form-control text-center" value="{{$department->name}}" autocomplete="off">
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{route("departments.index")}}" >
                            <button type="submit" class="btn btn-primary w-25">
                                แก้ไข
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
