<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Mahput Inventory</title>
</head>
<style>
    .alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 10px;
    border-radius: 5px;
}

.alert-error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 10px;
    border-radius: 5px;
}
</style>
<body>
    <pre>
        <div id="display"></div>

        <form id="form" method="post">
            <input type="text" name="nis" placeholder="Nis">
            <input type="text" name="nama" placeholder="Nama">
            <input type="text" name="password" placeholder="Password">
            <select name="jurusan" aria-placeholder="jurusan">
                <option value="#" disabled selected="hidden">Pilih jurusan</option>
                <option value="PPLG">PPLG</option>
                <option value="DKV">DKV</option>
            </select>
            <input type="text" name="no_tlp" placeholder="No_tlp">
            <textarea type="text" name="alamat" placeholder="Alamat"></textarea>
            <select name="kelas" aria-placeholder="kelas">
                <option value="#" disabled selected="hidden">Pilih kelas</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>

            <button type="submit">Register</button>
        </form>
        
    </pre>

    <script>
        const form = document.getElementById('form')
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        const dataForm = new FormData(form);
        const displayRespon = document.getElementById('display')

        fetch('register-proses.php', {
            body: dataForm,
            method: "POST"
        })
        .then(response => response.text())
        .then(data => {
            displayRespon.innerHTML = data
        })
        .catch(error => {
            console.error("error: " + error.message)
        })
    })
</script>

</body>     
</html>