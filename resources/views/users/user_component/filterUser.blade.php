<span class="mb-3 float-end">
        <form class="form-inline" >
            <form>
                <span class="float-start px-2">
                {{-- filter by type --}}
                <select class="form-select form-select-sm text-center bg rounded-1 form-select"
                        style="width: 150px; display: inline;"
                        name="selected_r" id="selected_r">
                    <option value="">เลือกหน้าที่</option>
                    @foreach($types as $ty)
                        <option value="{{ $ty->type }}" {{$filterUser['selected_r'] === $ty->type ? "selected" : ""}}>
                        {{ $ty->type }}
                        </option>
                    @endforeach
                </select>
                </span>
                <span class="float-start px-2">
                    <input type="text" class="form-control form-control-sm rounded-2 text-center"
                           style="padding: 0.25rem 0rem;"
                           name="search" id="search" autocomplete="off"
                           placeholder="- - - - ชื่อผู้ใช้งาน - - - -"
                           value="{{$filterUser['search_name']}}">
                </span>
                <button class="btn btn-primary btn-sm" formaction="{{route('user.filter')}}">search</button>
                <button class="btn btn-warning btn-sm" formaction="{{route('users.index')}}">clear</button>
            </form>
        </form>
    </span>
