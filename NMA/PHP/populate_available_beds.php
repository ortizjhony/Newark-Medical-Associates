<?php
include('session.php');

if(isset($_GET['room_number'])) {
    $roomNumber = $_GET['room_number'];
    
    // Query to select distinct bed numbers that are not occupied in the specified room
    $sql = "SELECT DISTINCT BedNumber FROM Room WHERE RoomNumber = ? AND Occupied = FALSE";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $roomNumber);  // "s" assumes RoomNumber is a string, use "i" if it's an integer
    $stmt->execute();
    $result = $stmt->get_result();
        
    $beds = [];
    while ($row = $result->fetch_assoc()) {
        $beds[] = ['BedNumber' => $row['BedNumber']];
        echo "<option value='".$row["BedNumber"]."'>".$row["BedNumber"]."</option>";
    }

    echo json_encode($beds);
    $stmt->close();
}

$conn->close();
?>

