
<?php
include('session.php');


$sql = "SELECT DISTINCT SkillCode, Description FROM SurgerySkill";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['SkillCode'] . "'>" . $row['Description'] . "</option>";
    }
} else {
    echo "<option value='none'>No Surgeons Found</option>";
}
$conn->close();
?>
