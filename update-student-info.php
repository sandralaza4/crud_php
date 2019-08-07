<?php
include 'header.php';
if (isset($_GET['id'])) {
    $student_info = $student_obj->view_student_by_student_id($_GET['id']);
    if (isset($_POST['update_student']) && $_GET['id'] === $_POST['id']) {
        $student_obj->update_student_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " > 
    <div class="row content">
        <a href="index.php"  class="button button-purple mt-12 pull-right">Voir la List des élèves</a> 
        <h3>Update Student Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($student_info['student_id'])) {
            echo $student_info['student_id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="student_nom">Nom:</label>
                <input type="text" name="student_nom" value="<?php if (isset($student_info['student_nom'])) {
                   echo $student_info['student_nom'];
        } ?>" id="student_nom" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="student_prenom">Prenom:</label>
                <input type="text" class="form-control" value="<?php if (isset($student_info['student_prenom'])) {
            echo $student_info['student_prenom'];
        } ?>" name="student_prenom" id="student_prenom" required maxlength="50">
            </div>

            <input type="submit" class="button button-green  pull-right" name="update_student" value="Update"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

