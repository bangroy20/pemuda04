<?php

include '../db.php';

function hapussaldo($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM baju04 WHERE id = $id");
    return mysqli_affected_rows($conn);
}

$id = $_GET["id"];

if (hapussaldo($id) > 0) {
    echo "<script>
            alert('data berhasil dihapus !!');
            document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "<script>
        alert('data gagal dihapus !!');
        document.location.href = 'index.php';
        </script>";
}
