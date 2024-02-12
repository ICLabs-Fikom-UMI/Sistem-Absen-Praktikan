    <div class="body-edit">
        <div class="container  d-flex justify-content-center align-items-center">
            <div class="content-beranda mt-5" >
                <h1 class="modal-title fs-5" id="exampleModalLabel jenis-font-label">Cetak Kehadiran Mahasiswa</h1>
                <!-- <form  class="mt-5" method="post" action="<?= BASEURL; ?>/Admin/updateDataMahasiswa"> -->
                <div class="row mt-5" >
                            <div class="col" id="dvContents">
                                <div class="overflow-auto" style="height: 300px;">
                                <table class="table table-striped table-bordered" id="my-table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Frekuensi</th>
                                            <th>Alpa</th>
                                            <th>Hadir</th>
                                            <th>Izin</th>
                                            <th>Sakit</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['mhst'] as $value): ?>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <?php echo $value['stb'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['nama'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['frekuensi'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['alpa'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['hadir'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['izin'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['sakit'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $total = $value['alpa'] + $value['hadir'] + $value['izin'] + $value['sakit'];
                                                        echo $total;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>  
                        </div>
                               
                        <div class="modal-footer jarak-3 mt-5 m-4">
                        <a class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" style="background-color: red; text-decoration: none; color: white;" href="<?= BASEURL; ?>/Admin/daftarAbsen">Batal</a>
                            <button type="button" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" onclick="PrintTable();">Cetak</button>
                        </div>
                       
                    </div>
                   
            </div> 
    
        </div>
    </div>



    <script type="text/javascript">
        function PrintTable() {
            var printWindow = window.open('', '', 'height=200,width=500');
            printWindow.document.write('<html><head><title>Table Contents</title>');
    
            //Print the Table CSS.
            // var table_style = document.getElementById("table_style").innerHTML;
            // printWindow.document.write('<style type = "text/css">');
            // printWindow.document.write(table_style);
            // Include Bootstrap CSS in the print window
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');
            printWindow.document.write('</head>');

            
    
            //Print the DIV contents i.e. the HTML Table.
            printWindow.document.write('<body>');
            var divContents = document.getElementById("dvContents").innerHTML;
            printWindow.document.write(divContents);
            printWindow.document.write('</body>');
    
            printWindow.document.write('</html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
