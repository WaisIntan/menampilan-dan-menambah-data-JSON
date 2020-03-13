<?php
$conn = new mysqli('localhost', 'id12777833_tugas2', '987654321', 'id12777833_tgs2');

if(!$conn){
    echo json_encode(['status' => 0, 'msg' => 'Koneksi Error Gan!!']);
    exit();
}

if($_POST['show'] == 1){
    $nama = $_POST['nama'];
    $jalan = $_POST['jalan'];
    $keterangan  = $_POST['keterangan'];
    // $date_ = date('d m Y');
    $cek_ = mysqli_query($conn, "SELECT * FROM data WHERE nama='$nama'");
    $cek = mysqli_num_rows($cek_);
    if(!$cek){
        $insert = mysqli_query($conn, "INSERT INTO data (nama, jalan, keterangan) VALUES ('$nama', '$jalan', '$keterangan')");
        if($insert){
            echo json_encode(['status' => 1, 'msg' => 'Data Berhasil di Masukkan.']);
            exit();
        }else{
            echo json_encode(['status' => 0, 'msg' => 'Data Tidak masuk.']);
            exit();
        }
    }else{
        echo json_encode(['status' => 0, 'msg' => 'Data Sudah Ada.']);
        exit();
    }
}else if($_POST['show'] == 2){
    $get_data = mysqli_query($conn, "SELECT * FROM data ORDER BY id DESC");
    $datas = [];
    while($post = mysqli_fetch_array($get_data)){
        $datas[] = $post;
    }
    echo json_encode(['status' => 1, 'data' => $datas]);
        exit();
}

echo json_encode(['status' => 0, 'msg' => 'Error.']);
    exit();