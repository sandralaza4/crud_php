<?php
include 'header.php';
$student_list = $student_obj->student_list();
?>
<div class="container " > 
    <div class="row content">
        <a  href="create-student-info.php"  class="button button-purple mt-12 pull-right">Ajouté un élève</a> 
        <h3>List des élèves</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
<?php
if ($student_list->num_rows > 0) {
  while ($row = $student_list->fetch_assoc()) {
     ?>
             <tr>
                <td><?php echo $row["student_nom"] ?></td>
                <td><?php echo $row["student_prenom"] ?></td>
                <td class="text-right">
                    <a  href="<?php echo 'delete-student-info.php?id=' . $row["student_id"] ?>" class="button button-red">Supprimé</a>  
                    <a  href="<?php echo 'update-student-info.php?id=' . $row["student_id"] ?>" class="button button-blue">Modifier</a>  
                    <a href="<?php echo 'read-student-info.php?id=' . $row["student_id"] ?>" class="button button-green">Voir</a>
                </td>
            </tr>
    <?php
    }
}
?>
           </tbody>
        </table>

    </div>
</div>
<?php
include 'footer.php';
?>