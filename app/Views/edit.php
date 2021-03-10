<h1>this is About page</h1>
<?php
if (isset($validation)) {
    echo $validation->listErrors();
}
if (session()->get('msg')) {
    echo "<p>".session()->get('msg')."</p>";
}
?>
<form action="<?php echo base_url('update')?>" method="post">
    <input type="hidden" value="<?= csrf_hash() ?>" name="csrf_test_name">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <input type="text" name="email" placeholder="Enter Your email" value="<?= $user['email'] ?>"  require><br><br>
    <input type="submit" value="Submit">
</form>
