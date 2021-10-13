<div class="modal fade" id="paidPopUp" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center m-3">
                <h5 class="mb-4">ชำระเงินของโต๊ะ {{$resTable->name}}</b></h5>
                <div class="mt-lg-3 row">
                    <div class="col">
                        <a class="btn btn-danger col-lg-5"
                           href="{{ route('bill.pay.table', ['resTable'=>$resTable]) }}"
                           role="button" style="margin-right: 5px;">ชำระเงิน</a>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-secondary col-lg-5" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
