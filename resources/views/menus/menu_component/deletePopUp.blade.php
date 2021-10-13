<div class="modal fade" id="deleteMenuModal{{$menu->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center m-3">
                <h5 class="mb-4">คุณต้องการลบ <b>{{$menu->name}}</b> ใช่หรือไม่?</h5>
                <div class="mt-lg-3 row">
                    <div class="col">
                        <form action="{{ route('menus.destroy', ['menu' => $menu->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger col-lg-5">
                                ลบ
                            </button>
                        </form>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-secondary col-lg-5" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
