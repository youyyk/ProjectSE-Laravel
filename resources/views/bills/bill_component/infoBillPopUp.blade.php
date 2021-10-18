<div class="modal fade" id="infoBill{{$bill->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ><b>รายละเอียดของบิล #{{$bill->id}}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table border-2 text-center">
                    <thead>
                    <tr>
                        <th class="border-2">ชื่อเมนู</th>
                        <th class="border-2">จำนวน</th>
                        <th class="border-2">ราคา</th>
                        <th class="border-2">สถานะ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bill->menus as $menu)
                        <tr class="something text-center align-middle">
                            <td class="border-2 p-0.5" style="width: 30%; font-size: 18px">
                                {{$menu->name}}
                            </td>
                            <td class="border-2 p-0.5" style="width: 10%; font-size: 18px">
                                {{$menu->pivot->amount}}
                            </td>
                            <td class="border-2 p-0.5" style="width: 20%; font-size: 18px">
                                {{$menu->price*$menu->pivot->amount}}
                            </td>
                            <td class="border-2 p-0.5" style="width: 20%; font-size: 18px">
                                @if($menu->pivot->status==="notStarted")
                                    <span class="badge rounded-pill alert-secondary">ยังไม่เริ่ม</span>
                                @elseif($menu->pivot->status==="inProcess")
                                    <span class="badge rounded-pill alert-primary">กำลังทำ</span>
                                @elseif($menu->pivot->status==="finish")
                                    <span class="badge rounded-pill alert-success">เสร็จสิ้น</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


