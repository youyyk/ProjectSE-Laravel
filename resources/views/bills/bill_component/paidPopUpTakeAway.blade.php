<div class="modal fade" id="paidPopUpTakeAway{{$bill->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center m-3">
                <h5 class="mb-4">ชำระเงินของบิล #{{$bill->id}}</h5>
                <h5 class="mb-4">ยอดชำระ {{$bill->total}} บาท</h5>
                <form action="{{ route('bill.pay.takeaway', ['bill' => $bill]) }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-group row">
                        <div style="margin-top: 10px">
                            <table class="table border-2">
                                <thead>
                                <tr class="text-center">
                                    <th class=""></th>
                                    <th class=""></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="something text-center align-middle">
                                    <td class="border-2" style="width: 50%">
                                        รับเงินมา
                                    </td>
                                    <td class="border-2" style="width: 50%">
                                        <input name="receiveMoney" type="number" min="1"
                                               class="form-control text-center @error('receiveMoney') border border-danger rounded is-invalid @enderror"
                                               autocomplete="off">
                                        @error('receiveMoney') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}

                                        <span class="invalid-feedback m-2 fs-6" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-lg-3 row">
                            <div class="col">
                                <button type="submit" class="btn btn-warning col-lg-5"
                                        style="margin-right: 5px;">
                                    ยืนยัน
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-secondary col-lg-5" data-bs-dismiss="modal">
                                    ยกเลิก
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
