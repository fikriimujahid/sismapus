<html>
    <head>
        <title>Perpustakaan</title>
        <link rel="stylesheet" href="css/perpus.css">
    </head>
    <body>
        <div class="formbuku">
        <form method="post">
            <input type="text" placeholder="ID buku" name="idbuku">
            <input type="text" placeholder="Nama buku" name="namabuku">
            <input type="text" placeholder="Pengarang" name="pengarang">
            <input type="text" placeholder="Penerbit" name="penerbit">
            <select name="kategori">
                <option value="IPA">IPA</option>
                <option value="IPS">IPS</option>
                <option value="Matematika">Matematika</option>
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Ingris">Bahasa Inggris</option>
                <option value="Fisika">Fisika</option>
                <option value="Kimia">Kimia</option>
            </select>
            <input type="text" placeholder="Edisi" name="edisi">
            <input type="text" placeholder="Stok" name="stok">
            <input type="text" placeholder="Halaman" name="halaman">
            <input type="text" placeholder="Tahun" name="tahun">
            <input type="submit" value="Tambah" name="tambah">
        </form>
            </div>
    </body>
    </html>