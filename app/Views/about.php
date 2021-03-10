<h1>this is About page</h1>
<?php
if (isset($validation)) {
    echo $validation->listErrors();
}
?>
<form action="<?php echo base_url('insert')?>" method="post">
    <input type="hidden" value="<?= csrf_hash() ?>" name="csrf_test_name">
    <input type="text" name="email" placeholder="Enter Your email"  require><br><br>
    <input type="submit" value="Submit">
</form>


