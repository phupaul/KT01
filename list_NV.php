<?php
require_once ("status.php");

?>
<?php include_once ("header.php");
?>

<?php

?>

<div class="container">
    <h2>Thông Tin Nhân Viên</h2>
    <div class="status">
        <table>
            <thead>
                <tr>
                    <th>Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th>Giới tính</th>
                    <th>Nơi Sinh</th>
                    <th>Tên Phòng</th>
                    <th>Lương</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db= new Db();
                $current_page = isset ($_GET['page']) ? $_GET['page'] : 1;
                $records_per_page = 5;
                $prods = $db->select_to_pages('NhanVien', $current_page, $records_per_page);
                foreach ($prods as $item) {
                    $check01 = $item["Phai"] == "NAM" ? "image/nam.png" : "image/nu.png";
                    $check02 = $item["Phai"] == "NAM" ? "NAM" : "NU";
                    echo "<tr>";
                    echo "<td>" . $item["MaNV"] . "</td>";
                    echo "<td>" . $item["TenNV"] . "</td>";
                    echo "<td><img src='$check01' alt='$check02' style='height: 22px'</td>";
                    echo "<td>" . $item["NoiSinh"] . "</td>";
                    echo "<td>" . $item["MaPhong"] . "</td>";
                    echo "<td>" . $item["Luong"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div>
        <?php echo "<a href='?page=".($current_page - 1)."'>Previous</a>"; ?>
        <?php echo "<a href='?page=".($current_page + 1)."'>Next</a>"; ?>
</div>

    </div>
</div>