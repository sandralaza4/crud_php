<?php
include 'header.php';
if (isset($_POST['create_student'])) {
    $student_obj->create_student_info($_POST);
}
?>
<div class="container"> 
    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">voir List</a> 
        <h3>Ajouter mon élève</h3>
        <hr/>
        <form method="post" action="">
            <div class="form-group">
                <label for="student_nom">Nom:</label>
                <input type="text" name="student_name" id="student_nom" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="student_prenom">Prenom:</label>
                <input type="text" class="form-control" name="prenom" id="student_prenom" required maxlength="50">
            </div>
            <input type="submit" class="button button-green  pull-right" name="create_student" value="Submit"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

