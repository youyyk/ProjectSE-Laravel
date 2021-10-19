<div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " >
        <div class="modal-content " class="w-100">
            <div class="modal-header">
                <h5 class="modal-title" ><b>แก้ไขผู้ใช้งาน</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">ชื่อ</label>
                        <div class="col-sm-6">
                            <input name="name" type="text" class="form-control text-center" value="{{ $user->name }}" autocomplete="off">
                        </div>
                    </div>


                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label" >ประเภท</label>
                        <div class="col-sm-6">
                            <select class="text-center bg rounded-1 form-select"
                                    style="width: 150px; display: inline;"
                                    name="type" id="type">
                                @foreach(["Admin","FrontWorker","BackWorker"] as $type)
                                    <option value="{{ $type }}"{{$user->type == $type ? "selected" : ""}}>
                                        @if($type =="Admin")
                                            แอดมิน
                                        @elseif($type =="FrontWorker")
                                            พนักงานหน้าร้าน
                                        @elseif($type =="BackWorker")
                                            พนักงานหลังร้าน
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 form-group row">
                        <label class="col-sm-4 col-form-label">เลือกรูปภาพ</label>
                        <div class="col-sm-6">
                            <input name="image" type="file" class="form-control form-control-sm" id="formFileSm">
                        </div>
                    </div>

                    <div>
                        <a href="{{route("users.index")}}" >
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
