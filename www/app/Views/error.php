<div class="row">  
    <div class="col-12">
        <div class="alert alert-danger">
            <?php echo htmlspecialchars(isset($texto) ? (string) $texto : '', ENT_QUOTES, 'UTF-8'); ?>
        </div>
    </div>
</div>