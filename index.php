<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Jika ada parameter 'edit' di URL, lakukan update
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $stmt = $conn->prepare("UPDATE mahasiswa SET nama_lengkap = ?, tempat_lahir = ?, tanggal_lahir = ?, jenis_kelamin = ?, agama = ?, alamat = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $_POST['nama_lengkap'], $_POST['tempat_lahir'], $_POST['tanggal_lahir'], $_POST['jenis_kelamin'], $_POST['agama'], $_POST['alamat'], $id);
        $stmt->execute();
        header("Location: index.php");
        exit;
    } else {
        // Jika tidak ada parameter 'edit', insert data baru
        $stmt = $conn->prepare("INSERT INTO mahasiswa (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $_POST['nama_lengkap'], $_POST['tempat_lahir'], $_POST['tanggal_lahir'], $_POST['jenis_kelamin'], $_POST['agama'], $_POST['alamat']);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CONNECT TO CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- CONNECT TO FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>


    <header id="header-section" class="section">
        <div class="container h100">
            <div id="header-content" class="h100">
                <div id="hc-col-1" class="hc">
                    <span class="header-logo">
                        <a href="/">MY PROFILE</a>
                    </span>
                </div>
                <div id="hc-col-2" class="hc">
                    <nav id="header-menu-wr" class="h100">
                        <ul class="h100">
                            <li>
                                <a href="#" data-btn="about">About Us</a>
                            </li>
                            <li>
                                <a href="#" data-btn="project">My Project</a>
                            </li>
                            <li>
                                <a href="#" data-btn="entry-data">Entry Data</a>
                            </li>
                            <li>
                                <a href="#" data-btn="contact">Contact Us</a>
                            </li>
                            <li class="close-button-menu">X</li>
                        </ul>
                    </nav>
                </div>
                <div id="hc-col-3" class="hc">
                    <div class="hc-col3-col-2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="hero-section" class="section section-height">
        <div class="container h100">
            <div id="hero-content" class="h100">
                <div id="hero-ctn-col1" class="heco h100">
                    <span class="hola-text">Hola!</span>
                    <h1 id="my-name">My Name is <span>Keanu RHM</span></h1>
                    <span>I'am Web Developer | Mahasiswa</span>
                    <div class="sosmed-on-hero">
                        <div class="wa">
                            <i class="fa-brands fa-whatsapp"></i>
                            081944221207
                        </div>
                        <div class="ig">
                            <i class="fa-brands fa-instagram"></i>
                            @kenaxuuuu
                        </div>
                        <div class="github">
                            <i class="fa-brands fa-github"></i>
                            https://github.com/keanuryansyah
                        </div>
                    </div>
                    <div class="hiasan-hero">
                        <img src="images/hiasan-hero.png" alt="">
                    </div>
                </div>
                <div id="hero-ctn-col2" class="heco h100">
                    <img src="images/my-photo.png" alt="Foto Keanu" title="Foto Keanu">
                </div>
            </div>
        </div>
    </section>

    <section id="about-section">
        <div class="container h100">
            <div id="about-content" class="h100">
                <p class="about-text">Saya adalah seorang Mahasiswa di Universitas Budi Luhur Jakarta. Fakultas Tekonologi Informasi, Jurusan Teknik Informatika. Sekaligus sebagai Web Developer. Saya lahir di Jakarta pada tanggal 12 Juli 2004. Umur saya 20 Tahun.</p>
                <br>
                <br>
                <p>Sedikit informasi, saya mulai mendalami ilmu di bidang website ini pada tahun 2021-Sekarang.</p>
                <br>
                <br>
                <p>Saya sudah cukup menguasai bahasa pemrograman dan framework2 yang dibutuhkan untuk membangun sebuah Website seperti PHP, JS, Laravel dan WordPress.</p>
            </div>
        </div>
    </section>

    <section id="myproject-section">
        <div class="container h100">
            <div id="myproject-content">
                <div class="mpc-row1">
                    <h2 class="section-title">My Project</h2>
                </div>
                <div class="mpc-row2">
                    <div id="mpc-r2-col1" class="mrc">
                        <img src="images/project1.png" alt="">
                    </div>
                    <div id="mpc-r2-col2" class="mrc">
                        <img src="images/project2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="form-section" class="section-height">
        <div class="container">
            <div id="form-content">
                <div id="fc-row1">
                    <h2 class="section-title">Entry Data</h2>
                </div>
                <div id="fc-row2" class="w100">
                    <form id="entry-data-diri" action="" method="post">
                        <?php
                        if (!isset($_GET['edit'])) {
                        ?>
                            <div id="edd-col1" class="edd">
                                <label for="nama-lengkap">Nama lengkap</label>
                                <input type="text" id="nama-lengkap" name="nama_lengkap">
                            </div>
                            <div id="edd-col2" class="edd">
                                <label for="tempat-lahir">Tempat lahir</label>
                                <input type="text" id="tempat-lahir" name="tempat_lahir">
                            </div>
                            <div id="edd-col3" class="edd">
                                <label for="tanggal-lahir">Tanggal lahir</label>
                                <input type="date" id="tanggal-lahir" name="tanggal_lahir">
                            </div>
                            <div id="edd-col4" class="edd">
                                <label for="jenis-kelamin">Jenis kelamin</label>
                                <div id="ed-col4-2row">
                                    <div id="ed-col4-2row-row1" class="ed-col4-2row">
                                        <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-Laki
                                    </div>
                                    <div id="ed-col4-2row-row2" class="ed-col4-2row">
                                        <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
                                    </div>
                                </div>
                            </div>
                            <div id="edd-col5" class="edd">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div id="edd-col6" class="edd">
                                <label for="alamat-rumah">Alamat</label>
                                <textarea name="alamat" id="alamat-rumah"></textarea>
                            </div>
                            <button type="submit">Simpan Data</button>

                        <?php
                        } else {
                            $id = $_GET['edit'];
                            $result = $conn->query("SELECT * FROM mahasiswa WHERE id = '$id' ");
                            $result = $result->fetch_assoc();

                        ?>
                            <div id="edd-col1" class="edd">
                                <label for="nama-lengkap">Nama lengkap</label>
                                <input type="text" id="nama-lengkap" name="nama_lengkap" value="<?php echo $result['nama_lengkap']; ?>">
                            </div>
                            <div id="edd-col2" class="edd">
                                <label for="tempat-lahir">Tempat lahir</label>
                                <input type="text" id="tempat-lahir" name="tempat_lahir" value="<?php echo $result['tempat_lahir']; ?>">
                            </div>
                            <div id="edd-col3" class="edd">
                                <label for="tanggal-lahir">Tanggal lahir</label>
                                <input type="date" id="tanggal-lahir" name="tanggal_lahir" value="<?php echo $result['tanggal_lahir'] ?>">
                            </div>
                            <div id="edd-col4" class="edd">
                                <label for="jenis-kelamin">Jenis kelamin</label>
                                <div id="ed-col4-2row">
                                    <div id="ed-col4-2row-row1" class="ed-col4-2row">
                                        <input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo $result['jenis_kelamin'] === 'laki-laki' ? 'checked' : '' ?>> Laki-Laki
                                    </div>
                                    <div id="ed-col4-2row-row2" class="ed-col4-2row">
                                        <input type="radio" name="jenis_kelamin" value="perempuan" <?php echo $result['jenis_kelamin'] === 'perempuan' ? 'checked' : '' ?>> Perempuan
                                    </div>
                                </div>
                            </div>
                            <div id="edd-col5" class="edd">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama">
                                    <option value="islam" <?php echo $result['agama'] == 'islam' ? 'selected' : '' ?>>Islam</option>
                                    <option value="kristen" <?php echo $result['agama'] == 'kristen' ? 'selected' : '' ?>>Kristen</option>
                                    <option value="katolik" <?php echo $result['agama'] == 'katolik' ? 'selected' : '' ?>>Katolik</option>
                                    <option value="hindu" <?php echo $result['agama'] == 'hindu' ? 'selected' : '' ?>>Hindu</option>
                                    <option value="budha" <?php echo $result['agama'] == 'budha' ? 'selected' : '' ?>>Budha</option>
                                    <option value="konghucu" <?php echo $result['agama'] == 'konghucu' ? 'selected' : '' ?>>Konghucu</option>
                                </select>
                            </div>
                            <div id="edd-col6" class="edd">
                                <label for="alamat-rumah">Alamat</label>
                                <textarea name="alamat" id="alamat-rumah"><?php echo $result['alamat']; ?></textarea>
                            </div>
                            <button type="submit">Update Data</button>


                        <?php
                        }
                        ?>
                    </form>

                    <div class="table-mahasiswa">
                        <table border="1" cellpadding="10" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $conn->query("SELECT * FROM mahasiswa");
                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = $result->fetch_assoc()) :
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['nama_lengkap'] ?></td>
                                            <td><?= $row['tempat_lahir'] ?></td>
                                            <td><?= $row['tanggal_lahir'] ?></td>
                                            <td><?= $row['jenis_kelamin'] ?></td>
                                            <td><?= $row['agama'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td>
                                                <a href="index.php?edit=<?= $row['id'] ?>">Edit</a>
                                                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php
                                } else {
                                ?>
                                    <p style="color: red;">No entries data!</p>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="contact-section">
        <div class="container h100">
            <div id="contact-content">
                <div id="contact-content-row1" class="ccr">
                    <h2 class="section-title">Contact Us</h2>
                </div>
                <div id="contact-content-row2" class="ccr w100">
                    <form action="#" method="get">
                        <div id="contact-row1" class="cr">
                            <label for="email" id="email" name="email">Enter your email Address</label>
                            <input type="text">
                        </div>
                        <div id="contact-row2" class="cr">
                            <label for="message" id="message" name="message">Enter your Messages</label>
                            <textarea name="message" id="message"></textarea>
                        </div>
                        <button type="button">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="popup-section">
        <div class="container h100">
            <div id="popup-content-wr">
                <div id="popup-ctn">

                    <h3 class="section-title">Halo!</h3>
                    <p>Ini adalah tugas PWTM 2 saya.</p>
                    <p>Lihat apa yang saya tambahkan di website ini sesuai dengan tugas yang di berikan.</p>
                    <button type="button" id="tugas-2">Lihat Sekarang</button>
                    <div class="close-btn-popup">X</div>
                </div>
            </div>
        </div>
    </section>

    <section id="footer-section">
        <div class="container h100">
            <div id="footer-content" class="w100 h100">
                Develop with love💕, By Keanu RHM.
            </div>
        </div>
    </section>

    <script src="global.js"></script>

</body>

</html>