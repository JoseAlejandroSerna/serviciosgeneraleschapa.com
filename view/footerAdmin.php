<script src="js/admin/materialize.min.js"></script>
<script src="js/admin/perfect-scrollbar.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>

<script src="js/admin/jquery.min.js"></script>
<script src="js/admin/popper.min.js"></script>
<script src="js/admin/bootstrap.min.js"></script>
<script src="js/admin/tooltips.js"></script>
<script src="js/admin/custom.js"></script>
<script src="js/admin/flatpickr.min.js"></script>
<script src="js/admin/flatpickerSales.js"></script>
<script src="js/admin/jquery.toast.min.js"></script>
<script src="js/admin/mdtechnology.js"></script>

<?php if($view == VIEW_ADMIN_SLIDER ||
        $view == VIEW_ADMIN_PROMOTION ||
        $view == VIEW_ADMIN_SERVICE ||
        $view == VIEW_ADMIN_SERVICE_DETAIL ||
        $view == VIEW_ADMIN_PROJECT ||
        $view == VIEW_ADMIN_OFFER ||
        $view == VIEW_ADMIN_OFFER_DETAIL ||
        $view == VIEW_ADMIN_QUESTIONS ||
        $view == "AdminQuestions"){?>
        
    <script src="js/admin/raphael.min.js"></script>
    <script src="js/admin/jquery.sparkline.min.js"></script>
    <script src="js/admin/jquery.dataTables.min.js"></script>
    <script src="js/admin/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="js/admin/DTables.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_SLIDER){?>
    <script src="js/admin/adminSlider.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_PROMOTION){?>
    <script src="js/admin/adminPromotion.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_SERVICE){?>
    <script src="js/admin/adminService.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_SERVICE_DETAIL){?>
    <script src="js/admin/adminServiceDetail.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_PROJECT){?>
    <script src="js/admin/adminProject.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_OFFER){?>
    <script src="js/admin/adminOffer.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_OFFER_DETAIL){?>
    <script src="js/admin/adminOfferDetail.js"></script>
<?php }?>
<?php if($view == VIEW_ADMIN_QUESTIONS){?>
    <script src="js/admin/adminQuestions.js"></script>
<?php }?>
<?php if($view == "AdminQuestions"){?>
    <script src="js/admin/adminQuestions.js"></script>
<?php }?>