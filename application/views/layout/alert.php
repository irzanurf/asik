<?php if(!empty($this->session->flashdata('info')) || ($this->session->flashdata('info')!='')){ ?>
<div class="modal fade" id="alert" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-primary ms-2" data-dismiss="modal" aria-label="Close">
                    <i class="la la-close" style="color:black"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#alert').modal('show');
});
</script>
<?php } ?>
<?php
					$this->session->set_flashdata('info','' );
					?>