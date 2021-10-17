<div class="modal fade" id="infoBill{{$bill->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ><b>รายละเอียดของบิล #{{$bill->id}}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="margin: auto">
                    @foreach($bill->menus as $menu)
                        <div style="font-size: 20px">
                            <span>{{ $menu->name }}</span>
                            <span>{{ $menu->pivot->amount }}</span>
                            @if($menu->pivot->status==="notStarted")
                                <span class="badge rounded-pill alert-secondary">ยังไม่เริ่ม</span>
                            @elseif($menu->pivot->status==="inProcess")
                                <span class="badge rounded-pill alert-primary">กำลังทำ</span>
                            @elseif($menu->pivot->status==="finish")
                                <span class="badge rounded-pill alert-success">เสร็จสิ้น</span>
                            @endif
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>


