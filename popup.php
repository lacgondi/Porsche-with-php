<?php include('inc/header.php'); ?>

<div class="modal fade" id="orderConfirm" tabindex="-1" role="dialog" aria-labelledby="orderConfirmLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderConfirmLabel">Order successful</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="home();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your order is successful. We will get back to you with the paperwork shortly.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="home();">OK</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    let myModal = new bootstrap.Modal(document.getElementById('orderConfirm'), {});
    myModal.show();

    function home() {
        window.location.replace("/index.php");
    }
</script>