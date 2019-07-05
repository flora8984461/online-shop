<?php
    require '../core/init.php';
    $id = $_POST['id'];
    $id = (int)$id;
    $sql="SELECT * FROM products WHERE id = '$id'";
    $result = $db -> query($sql);
    $product = mysqli_fetch_assoc($result);
?>

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade" id="detailModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle"><?php echo $product['title'];?></h5>
                <button type="button" class="close" onclick="closemodal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>size:</h5>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">size 1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">size 2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                    <label class="form-check-label" for="inlineRadio3">size 3</label>
                </div>

                <h5>quantity:</h5>

                    <input type="number" value="1" min="0" max="5" step="1"/>

                <h5>description:</h5><p><?php echo $product['description'];?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closemodal()">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">$("input[type='number']").InputSpinner()</script>
<script>
    function closemodal(){
        $("#detailModalCenter").modal('hide');
        setTimeout(function () {
            $("#detailModalCenter").remove();
        },500);
    }
</script>

<?php echo ob_get_clean(); ?>


