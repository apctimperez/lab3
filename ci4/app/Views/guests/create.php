<h2><?= isset($name) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?php echo site_url('guests'); ?>" method="post">
    <?= csrf_field() ?>

    <label for="name">Name</label>
    <input type="input" name="name" value="<?= set_value('name') ?>">
    <br>

    <label for="email">Email</label>
    <input type="input" name="email" value="<?= set_value('email') ?>">
    <br>

    <label for="website">Website</label>
    <textarea name="website" cols="50" rows="1"><?= set_value('website') ?></textarea>
    <br>

    <label for="comment">Comment</label>
    <textarea name="comment" cols="45" rows="4"><?= set_value('comment') ?></textarea>
    <br>

    <label for="gender">Gender</label>
    <textarea name="gender" cols="45" rows="1"><?= set_value('gender') ?></textarea>
    <br>

    <input type="submit" name="submit" value="New Guest">

</form>