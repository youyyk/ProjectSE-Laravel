<span class="mb-3 float-end">
            <form class="form-inline" >
                <span class="col-1">filter : </span>
                {{-- filter by category --}}
                <select class="text-center bg rounded-1" name="selected_cat" id="selected_cat">
                    <option value="">เลือกประเภท</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->category }}" {{$filterMenu['select_c'] === $cat->category ? "selected" : ""}}>
                            {{ $cat->category }}
                            </option>
                    @endforeach
                </select>
                {{-- filter by department --}}
                <span class="col-sm-1">
                <select class="text-center bg rounded-1" name="selected_depart" id="selected_depart">
                    <option value="">เลือกแผนก</option>
                    @foreach($departments as $depart)
                        @if(($user_role=='frontWorker' && $depart->id !== 1) || $user_role=='admin')
                        <option value="{{ $depart->id }}" {{$filterMenu['select_d'] == $depart->id ? "selected" : ""}}>
                            {{ $depart->name }}
                        </option>
                        @endif
                    @endforeach
                </select>
            </span>
                {{-- search by name --}}
                <input type="text" class="rounded-2 text-center" name="search" id="search" autocomplete="off" placeholder="- - - - ชื่อเมนู - - - -" value="{{$filterMenu['search_name']}}">
                @if($user_role=='admin')
                    <button class="btn btn-primary" formaction="{{route('menu.filter')}}">search</button>
                    <button class="btn btn-warning" formaction="{{route('menus.index')}}">clear</button>
                @elseif($user_role=='frontWorker')
                    <button class="btn btn-primary" formaction="{{route('menu.filter.chooseMenu',['tableId'=>$resTable->id])}}">search</button>
                    <button class="btn btn-warning" formaction="{{route('menu.choose.index',['tableId'=>$resTable->id])}}">clear</button>
                @endif


            </form>
        </span>
